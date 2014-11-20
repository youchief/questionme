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
                        $this->request->data['User']['token'] = sha1($this->data['User']['username'] . rand(0, 100));

                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(__('C\'est Top ! On vient de t\'envoyer un email à "'.$this->request->data['User']['email'].'" pour activer ton compte !'), 'message_success');
                                $Email = new CakeEmail();
                                $Email->from(array('no-repy@questionme.ch' => 'Question Me'));
                                $Email->to($this->request->data['User']['email']);
                                $Email->subject('Merci d’avoir rejoint la communauté QuestionMe !');
                                $Email->viewVars(array(
                                    'user' => $this->request->data['User']['username'],
                                    'link' => FULL_BASE_URL . '/users/verify/t:' . $this->request->data['User']['token'] . '/n:' . $this->data['User']['username']));
                                $Email->emailFormat('html');
                                $Email->template('welcome');
                                $Email->send();

                                return $this->redirect(array('action' => 'login'));
                        } else {
                                $this->Session->setFlash(__('Petit problème :-/'), 'message_danger');
                        }
                }
                $regions = $this->User->Region->find('list');
                $this->set(compact('regions'));
        }

        public function login() {


                if ($this->request->is('post')) {

                        if ($this->Auth->login()) {
                                if ($this->Auth->user('active') == 0) {
                                        $this->Session->setFlash(__("Tu n'as pas encore activé ton compte. Check voir ta boîte mail ! "), 'message_danger');
                                        return $this->redirect($this->Auth->logout());
                                } else if ($this->Auth->user('active') == 1) {
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
                                }
                        } else {
                                $this->Session->setFlash(__("Pseudo ou mot de passe invalide"), 'message_danger');
                        }
                }
                $regions = $this->User->Region->find('list');
                $this->set(compact('regions'));
                $this->render('connexion');
        }

        public function verify() {
                //check if the token is valid
                if (!empty($this->passedArgs['n']) && !empty($this->passedArgs['t'])) {
                        $name = $this->passedArgs['n'];
                        $tokenhash = $this->passedArgs['t'];
                        $results = $this->User->findByUsername($name);
                        if ($results['User']['active'] == 0) {
                                //check the token
                                if ($results['User']['token'] == $tokenhash) {
                                        $this->User->id = $results['User']['id'];
                                        //Save the data
                                        $this->User->saveField('active', 1);
                                        $this->Session->setFlash('Félicitations tu fais partie des nôtres ! Connecte-toi et commence à jouer !', 'message_success');
                                        $this->redirect('login');
                                } else {
                                        $this->Session->setFlash('Echec de l\'acitivation', 'message_danger');
                                        $this->redirect('register');
                                }
                        } else {
                                $this->Session->setFlash('Utilisteur déjà actif!', 'message_info');
                                $this->redirect('login');
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
                        if ($this->User->save($this->request->data)) {
                                $this->Session->setFlash(__('Ton profil a été modifié!'), 'message_success');
                                return $this->redirect(array('action' => 'my_profile'));
                        } else {
                                $this->Session->setFlash(__('Petit problème :-/'), 'message_danger');
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
                        if($this->request->data['User']['new_password'] != null && $this->request->data['User']['new_password'] != ''){
                            if ($this->request->data['User']['new_password'] == $this->request->data['User']['retype_password']) {
                                    $this->User->id = $this->Auth->user('id');
                                    $this->User->saveField('password', $this->request->data['User']['new_password']);
                                    $this->Session->setFlash(__('Ton mot de passe a été changé !'), 'message_success');
                                    return $this->redirect(array('action' => 'my_profile'));
                            } else {
                                    $this->Session->setFlash(__('Les deux champs ne sont pas identiques :-('), 'message_danger');
                            }
                        }else{
                            $this->Session->setFlash(__('Tu dois rentrer un nouveau mot de passe'), 'message_danger');
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
                $this->User->recursive = 2;
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
                                $new_password = $this->_generatePassword();

                                $this->User->id = $user['User']['id'];
                                $this->User->saveField('password', $new_password);
                                $Email = new CakeEmail();
                                $Email->from(array('no-repy@questionme.ch' => 'Question Me'));
                                $Email->to($user['User']['email']);
                                $Email->subject('Changement de mot de passe QuestionMe');
                                $Email->viewVars(array('user' => $user['User']['username'], 'password' => $new_password));
                                $Email->emailFormat('html');
                                $Email->template('recover');
                                $Email->send();
                                $this->Session->setFlash(__('On t\'a envoyé un nouveau mot de passe !  '), 'message_success');
                                return $this->redirect(array('action' => 'login'));
                        } else {
                                $this->Session->setFlash(__('Pas trouvé :-/'), 'default', array('class' => 'alert alert-danger'));
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

        public function admin_get_nb_gamer() {
                $gamers = $this->User->find('count', array('conditions' => array('User.group_id' => 2)));
                return $gamers;
        }

        public function admin_export() {
                //$this->User->recursive = 2;

                //set_time_limit('120');

                $users = $this->User->find('all', array(
                    'contain' => array(
                        'Choice' => array(
                            'fields' => array('id', 'response'),
                        )
                    )
                        )
                );

                $result = array();

                $i = 0;
                foreach ($users as $user) {
                        foreach ($user['Choice'] as $choice) {
                                $result[$i]['User']['reponse_date'] = $choice['UsersChoice']['created'];
                               // $result[$i]['User']['question'] = $choice['Question']['question'];
                                $result[$i]['User']['question_id'] = $choice['UsersChoice']['question_id'];
                                //$result[$i]['User']['order_id'] = $choice['Question']['order_id'];
                                $result[$i]['User']['question_type'] = $choice['UsersChoice']['question_type_id'];
                                $result[$i]['User']['free'] =$choice['UsersChoice']['free'];
                                $result[$i]['User']['response_id'] =$choice['UsersChoice']['choice_id'];
                                $result[$i]['User']['id'] = $user['User']['id'];
                                $result[$i]['User']['username'] = $user['User']['username'];
                                $result[$i]['User']['user_sex'] = $user['User']['sex'];
                                $result[$i]['User']['user_birthday'] = $user['User']['birthday'];
                                $result[$i]['User']['region_id'] = $user['User']['region_id'];
                                $i++;
                        }
                }
   
                
                CakePlugin::load('CsvView');

                $_serialize = 'result';
                $_header = array('Date de réponce',  'Question ID' ,'Type de question ID', 'Réponse FREE', 'Reponse ID', 'User ID', 'Username', 'Sexe', 'Birthday', 'Region ID');
                $_extract = array('User.reponse_date', 'User.question_id', 'User.question_type','User.free' ,'User.response_id', 'User.id', 'User.username', 'User.user_sex', 'User.user_birthday', 'User.region_id');
                $_delimiter = ";"; //tab
                $this->response->download('export_result_qme.csv');
                $this->viewClass = 'CsvView.Csv';
                $this->set(compact('result', '_serialize', '_header', '_extract', '_delimiter'));

        }

        public function admin_export_profile() {
                $users = $this->User->find('all');


                $result = array();

                $i = 0;
                foreach ($users as $user) {
                        foreach ($user['Profile'] as $profile) {
                                $result[$i]['User']['question'] = $profile['key'];
                                $result[$i]['User']['response'] = $profile['value'];
                                $result[$i]['User']['username'] = $user['User']['username'];
                                $result[$i]['User']['user_sex'] = $user['User']['sex'];
                                $result[$i]['User']['user_birthday'] = $user['User']['birthday'];
                                $i++;
                        }
                }
                CakePlugin::load('CsvView');

                $_serialize = 'result';
                $_header = array('Question', 'Réponse', 'Username', 'Sexe', 'Birthday');
                $_extract = array('User.question', 'User.response', 'User.username', 'User.user_sex', 'User.user_birthday');
                $_delimiter = ";"; //tab
                $this->response->download('export_profiles_qme.csv');
                $this->viewClass = 'CsvView.Csv';
                $this->set(compact('result', '_serialize', '_header', '_extract', '_delimiter'));
        }
        
        
        public function admin_export_users(){  
                $this->User->recursive = -1;
                $users = $this->User->find('all');
                CakePlugin::load('CsvView');
                $_serialize = 'users';
                $_header = array("id", "username", "created","sexe", "birthday", "email", "region_id");
                $_extract = array('User.id', 'User.username', 'User.created', 'User.sex', 'User.birthday', 'User.email', 'User.region_id');
                $_delimiter = ";"; //tab
                $this->response->download('export_users_qme.csv');
                $this->viewClass = 'CsvView.Csv';
                $this->set(compact('users', '_serialize', '_header', '_extract', '_delimiter'));
        }
       

}
