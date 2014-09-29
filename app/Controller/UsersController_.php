<?php

App::uses('AppController', 'Controller');

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

        public function register() {
                if ($this->request->is('post')) {
                        if (!empty($this->request->data)) {
                                // We can save the User data:
                                // it should be in $this->request->data['User']

                                $user = $this->User->save($this->request->data);

                                // If the user was saved, Now we add this information to the data
                                // and save the Profile.

                                if (!empty($user)) {
                                        // The ID of the newly created user has been set
                                        // as $this->User->id.
                                        $this->request->data['Profile']['user_id'] = $this->User->id;

                                        // Because our User hasOne Profile, we can access
                                        // the Profile model through the User model:
                                        $this->User->Profile->save($this->request->data);
                                }
                        }
                }
                $regions = $this->User->Profile->Region->find('list');
                $this->set(compact('regions'));
        }

        public function admin_login() {
                if ($this->request->is('post')) {
                        if ($this->Auth->login()) {
                                return $this->redirect($this->Auth->redirect());
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
                $choices = $this->User->Choice->find('list');
                $gifts = $this->User->Gift->find('list');
                $vouchers = $this->User->Voucher->find('list');
                $this->set(compact('groups', 'choices', 'gifts', 'vouchers'));
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
                $choices = $this->User->Choice->find('list');
                $gifts = $this->User->Gift->find('list');
                $vouchers = $this->User->Voucher->find('list');
                $this->set(compact('groups', 'choices', 'gifts', 'vouchers'));
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

}
