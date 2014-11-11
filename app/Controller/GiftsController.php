<?php

App::uses('AppController', 'Controller');

/**
 * Gifts Controller
 *
 * @property Gift $Gift
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GiftsController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');
        public $uses = array('Gift', 'UsersChoice', 'User');

        public function use_it($id = null) {
                if (!$this->Gift->exists($id)) {
                        throw new NotFoundException(__('Invalid BigGift'));
                }

                if ($this->request->is('post')) {
                        $big = $this->Gift->findById($id);

                        if ($big['Gift']['used'] <> null) {
                                $this->Session->setFlash(__('Code déjà utilisé!'), 'default', array('class' => 'alert alert-danger'));
                                $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
                        }

                        if ($this->request->data['Gift']['code'] == $big['Customer']['code']) {
                                $this->Gift->id = $id;
                                $this->Gift->saveField('used', date('Y-m-d H:i:s'));
                                $this->Session->setFlash(__('Merci d\'offir le cadeau !'), 'default', array('class' => 'alert alert-success'));
                                $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
                        } else {
                                $this->Session->setFlash(__('Code erroné ! Essaie encore !'), 'default', array('class' => 'alert alert-danger'));
                                $this->redirect($this->referer());
                        }
                }


                $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
                $this->set('gift', $this->Gift->find('first', $options));
        }

        public function view($id = null) {
                if (!$this->Gift->exists($id)) {
                        throw new NotFoundException(__('Invalid gift'));
                }
                $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
                $gift = $this->Gift->find('first', $options);
                $this->set('gift', $gift);
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->Gift->recursive = 0;
                $this->set('gifts', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->Gift->exists($id)) {
                        throw new NotFoundException(__('Invalid gift'));
                }
                $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
                $gift = $this->Gift->find('first', $options);
                $winner = array('User' => array('username' => 'no body'));
                if (!empty($gift['Gift']['winner_id'])) {
                        $winner = $this->User->findById($gift['Gift']['winner_id']);
                }
                $this->set('winner', $winner);
                $this->set('gift', $gift);
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->Gift->create();
                        if ($this->Gift->save($this->request->data)) {
                                $this->Session->setFlash(__('The gift has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The gift could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                $customers = $this->Gift->Customer->find('list');
                $qdays = $this->Gift->Qday->find('list');
                $this->set(compact('customers', 'qdays'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->Gift->exists($id)) {
                        throw new NotFoundException(__('Invalid gift'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Gift->save($this->request->data)) {
                                $this->Session->setFlash(__('The gift has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The gift could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
                        $this->request->data = $this->Gift->find('first', $options);
                }
                $customers = $this->Gift->Customer->find('list');
                $qdays = $this->Gift->Qday->find('list');
                $this->set(compact('customers', 'qdays'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->Gift->id = $id;
                if (!$this->Gift->exists()) {
                        throw new NotFoundException(__('Invalid gift'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->Gift->delete()) {
                        $this->Session->setFlash(__('Gift deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Gift was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

        public function admin_draw($id) {
                $gift = $this->Gift->findById($id);

                $user_choices = $this->UsersChoice->find('all', array(
                    'conditions' => array(
                        'UsersChoice.created >' => $gift['Qday']['start'],
                        'UsersChoice.created <' => $gift['Qday']['end'],
                    ),
                    'fields' => array('DISTINCT UsersChoice.question_id', 'UsersChoice.user_id'),
                        )
                );

                shuffle($user_choices);

                $winner = $this->UsersChoice->User->findById($user_choices[0]['UsersChoice']['user_id']);

                $this->set('user', $winner);
                $this->set('gift_id', $id);
        }

        public function admin_validate($user_id, $gift_id) {
                $gift = $this->Gift->findById($gift_id);
                $user = $this->User->findById($user_id);
                
                $this->Gift->id = $gift_id;
                $this->Gift->saveField('winner_id', $user_id);
                $this->Session->setFlash(__('The gift has been given'), 'default', array('class' => 'alert alert-success'));

                $Email = new CakeEmail();
                $Email->from(array('no-repy@questoionme.ch' => 'Question Me'));
                $Email->to($user['User']['email']);
                $Email->subject('Merci d’avoir rejoint la communauté QuestionMe !');
                $Email->viewVars(array('user' => $user['User']['username'], 'gift'=>$gift['Gift']['name'], 'link'=>'http://www.questionme.ch/vouchers/my_vouchers'));
                $Email->emailFormat('html');
                $Email->template('winner');
                $Email->send();

                $this->redirect(array('action' => 'index'));
        }

}
