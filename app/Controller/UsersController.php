<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');
        //public $helpers = array('Facebook.Facebook');

        public function register() {
                if ($this->request->is('post')) {
                        $this->User->create();
                        //group gamer
                        $this->request->data['User']['group_id'] = 2;

                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(__('Barvo ! Connectez-vous et commencer à jouer dès maintenant!'), 'default', array('class' => 'alert alert-success'));
                                
                                $Email = new CakeEmail();
                                $Email->from(array('no-repy@questoionme.ch' => 'Question Me'));
                                $Email->to($this->request->data['User']['email']);
                                $Email->subject('Merci d’avoir rejoint la communauté QuestionMe !');
                                $Email->viewVars(array('user' => $this->request->data['User']['username']));
                                $Email->emailFormat('html');
                                $Email->template('welcome');
                                $Email->send();
                                
                                return $this->redirect(array('action' => 'login'));
                        } else {
                                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                        }
                }
                $regions = $this->User->Region->find('list');
                $this->set(compact('regions'));
        }

        public function login() {


                if ($this->request->is('post')) {
                        if ($this->Auth->login()) {
                                $user = $this->Auth->user();

                                $group_actions = $this->User->Group->find('first', array(
                                    'conditions' => array('Group.id' => $user['group_id']),
                                        )
                                );

                                $actions = array();
                                foreach ($group_actions['Action'] as $action) {

                                        $actions[] = $action['app_action'];
                                }

                                $this->Session->write('actions', $actions);

                                return $this->redirect($this->Auth->redirect());
                        } else {
                                $this->Session->setFlash(__("Invalid username and/or password"), 'default', array('class' => 'alert alert-danger'));
                        }
                }
        }

        public function logout() {
                $this->Session->delete('actions');
                return $this->redirect($this->Auth->logout());
        }

        public function my_profile() {
                $user = $this->User->findById($this->Auth->user('id'));
                $this->set('user', $user);
        }

        public function edit_my_profile() {

                if ($this->request->is('post') || $this->request->is('put')) {
                        //debug($this->request->data);

                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                        }
                } else {
                        $options = array('conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id')));
                        $this->request->data = $this->User->find('first', $options);
                }
                $regions = $this->User->Region->find('list');
                $this->set(compact('regions'));
        }

        public function change_password() {
                if ($this->request->is('post')) {
                        if ($this->request->data['User']['new_password'] == $this->request->data['User']['retype_password']) {
                                $this->User->id = $this->Auth->user('id');
                                $this->User->saveField('password', $this->request->data['User']['new_password'], array('validate' => true));
                                $this->Session->setFlash(__('The password has been changed'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'my_profile'));
                        } else {
                                $this->Session->setFlash(__('Password are not the same :-('), 'default', array('class' => 'alert alert-danger'));
                        }
                }
        }

        public function admin_login() {
                if ($this->request->is('post')) {
                        if ($this->Auth->login()) {
                                return $this->redirect(array('controller' => 'users', 'action' => 'welcome'));
                        }
                        $this->Session->setFlash(__('Invalid username or password, try again'), 'default', array('class' => 'alert alert-danger'));
                }
        }

        public function admin_logout() {
                return $this->redirect($this->Auth->logout());
        }

        public function admin_welcome() {
                
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->User->recursive = 0;
                $this->set('users', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->User->exists($id)) {
                        throw new NotFoundException(__('Invalid user'));
                }
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $this->set('user', $this->User->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->User->create();
                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                        }
                }
                $groups = $this->User->Group->find('list');
                $regions = $this->User->Region->find('list');
                $choices = $this->User->Choice->find('list');
                $gifts = $this->User->Gift->find('list');
                $this->set(compact('groups', 'regions', 'choices', 'gifts'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->User->exists($id)) {
                        throw new NotFoundException(__('Invalid user'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                        }
                } else {
                        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                        $this->request->data = $this->User->find('first', $options);
                }
                $groups = $this->User->Group->find('list');
                $regions = $this->User->Region->find('list');
                $choices = $this->User->Choice->find('list');
                $gifts = $this->User->Gift->find('list');
                $this->set(compact('groups', 'regions', 'choices', 'gifts'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->User->id = $id;
                if (!$this->User->exists()) {
                        throw new NotFoundException(__('Invalid user'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->User->delete()) {
                        $this->Session->setFlash(__('User deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('User was not deleted'), 'default', array('class' => 'alert alert-danger'));
                return $this->redirect(array('action' => 'index'));
        }

        public function recover() {
                if ($this->request->is('post')) {
                        $user = $this->User->findByEmail($this->request->data['User']['email']);
                        if (!empty($user)) {
                                //debug($user);
                                $Email = new CakeEmail();
                                $Email->from(array('no-repy@questoionme.ch' => 'Question Me'));
                                $Email->to($user['User']['email']);
                                $Email->subject('Password recovery');
                                $Email->viewVars(array('user' => $user['User']['username'], 'password' => $this->_generatePassword()));
                                $Email->emailFormat('html');
                                $Email->template('recover');
                                $Email->send();
                                $this->Session->setFlash(__('We sent you a new password !'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'login'));
                        } else {
                                $this->Session->setFlash(__('User not found!'), 'default', array('class' => 'alert alert-danger'));
                        }
                }
        }

        public function _generatePassword($length = 8) {

                // start with a blank password
                $password = "";

                $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

                // we refer to the length of $possible a few times, so let's grab it now
                $maxlength = strlen($possible);

                // check for length overflow and truncate if necessary
                if ($length > $maxlength) {
                        $length = $maxlength;
                }

                // set up a counter for how many characters are in the password so far
                $i = 0;

                // add random characters to $password until $length is reached
                while ($i < $length) {

                        // pick a random character from the possible ones
                        $char = substr($possible, mt_rand(0, $maxlength - 1), 1);

                        // have we already used this character in $password?
                        if (!strstr($password, $char)) {
                                // no, so it's OK to add it onto the end of whatever we've already got...
                                $password .= $char;
                                // ... and increase the counter by one
                                $i++;
                        }
                }

                // done!
                return $password;
        }
        
        
        public function admin_get_nb_gamer(){
                $gamers = $this->User->find('count', array('conditions'=>array('User.group_id'=>2)));
                return $gamers;
        }

}
