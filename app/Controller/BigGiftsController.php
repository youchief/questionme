<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


/**
 * BigGifts Controller
 *
 * @property BigGift $BigGift
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BigGiftsController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $uses = array('BigGift', 'UsersChoice', 'User');
        public $components = array('Paginator', 'Session');

        public function use_it($id = null) {
                if (!$this->BigGift->exists($id)) {
                        throw new NotFoundException(__('Invalid BigGift'));
                }

                if ($this->request->is('post')) {
                        
                        

                        $big = $this->BigGift->findById($id);
                        
                        if($big['BigGift']['used'] <> null){
                                $this->Session->setFlash(__('Code déjà utilisé!'), 'default', array('class' => 'alert alert-danger'));
                                $this->redirect(array('controller'=>'vouchers', 'action' => 'my_vouchers'));
                        }
                        
                        if ($this->request->data['BigGift']['code'] == $big['Customer']['code']) {
                                $this->BigGift->id = $id;
                                $this->BigGift->saveField('used', date('Y-m-d H:i:s'));
                                $this->Session->setFlash(__('Merci d\'offir le cadeau !'), 'message_success');
                                $this->redirect(array('action'=>'partner', $id));
                        } else {
                                $this->Session->setFlash(__('Code erroné ! Essaie encore !'), 'default', array('class' => 'alert alert-danger'));
                                $this->redirect($this->referer());
                        }
                }


                $options = array('conditions' => array('BigGift.' . $this->BigGift->primaryKey => $id));
                $this->set('bigGift', $this->BigGift->find('first', $options));
        }
        
        public function partner($gift_id){
                $gift = $this->BigGift->findById($gift_id);
                $this->set('voucher', $gift['BigGift']['name']);
                $this->set('customer', $gift['Customer']['name']);
                $this->set('img', $gift['BigGift']['media']);
                $this->set('used', $gift['BigGift']['used']);
                $this->render('/vouchers/partner');
                
                
        }
        
        

        public function view($id = null) {
                if (!$this->BigGift->exists($id)) {
                        throw new NotFoundException(__('Invalid gift'));
                }
                $options = array('conditions' => array('BigGift.' . $this->BigGift->primaryKey => $id));
                $gift = $this->BigGift->find('first', $options);

                $this->set('bigGift', $gift);
        }
        
        
        public function delete($gift_id) {
                $this->BigGift->id = $gift_id;
                $this->BigGift->saveField('winner_id', null);
                $this->redirect(array('controller'=>'vouchers', 'action'=>'my_vouchers'));
                $this->Session->setFlash(__('Cadeau effacé !'), 'message_danger');

	}

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->BigGift->recursive = 0;
                $this->set('bigGifts', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->BigGift->exists($id)) {
                        throw new NotFoundException(__('Invalid gift'));
                }
                $options = array('conditions' => array('BigGift.' . $this->BigGift->primaryKey => $id));
                $gift = $this->BigGift->find('first', $options);
                $winner = array('User' => array('username' => 'no body'));
                if (!empty($gift['BigGift']['winner_id'])) {
                        $winner = $this->User->findById($gift['BigGift']['winner_id']);
                }
                $this->set('winner', $winner);
                $this->set('bigGift', $gift);
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->BigGift->create();
                        if ($this->BigGift->save($this->request->data)) {
                                $this->Session->setFlash(__('The big gift has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The big gift could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                $qweeks = $this->BigGift->Qweek->find('list');
                $customers = $this->BigGift->Customer->find('list');
                $this->set(compact('qweeks', 'customers'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->BigGift->exists($id)) {
                        throw new NotFoundException(__('Invalid big gift'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->BigGift->save($this->request->data)) {
                                $this->Session->setFlash(__('The big gift has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The big gift could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('BigGift.' . $this->BigGift->primaryKey => $id));
                        $this->request->data = $this->BigGift->find('first', $options);
                }
                $qweeks = $this->BigGift->Qweek->find('list');
                $customers = $this->BigGift->Customer->find('list');
                $this->set(compact('qweeks', 'customers'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->BigGift->id = $id;
                if (!$this->BigGift->exists()) {
                        throw new NotFoundException(__('Invalid big gift'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->BigGift->delete()) {
                        $this->Session->setFlash(__('Big gift deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Big gift was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

        public function admin_draw($id) {
                $gift = $this->BigGift->findById($id);

                $user_choices = $this->UsersChoice->find('all', array(
                    'conditions' => array(
                        'UsersChoice.created >' => $gift['Qweek']['start'],
                        'UsersChoice.created <' => $gift['Qweek']['end'],
                    ),
                    'fields' => array('DISTINCT UsersChoice.question_id', 'UsersChoice.user_id'),
                        )
                );

                shuffle($user_choices);

                $winner = $this->UsersChoice->User->findById($user_choices[0]['UsersChoice']['user_id']);

                $this->set('winner', $winner);
                $this->set('gift_id', $id);
        }

        public function admin_validate($user_id, $gift_id) {
                $gift = $this->BigGift->findById($gift_id);
                $user = $this->User->findById($user_id);
                
                
                $this->BigGift->id = $gift_id;
                $this->BigGift->saveField('winner_id', $user_id);
                
                $Email = new CakeEmail('smtp');
                $Email->from(array('hello@questoionme.ch' => 'Question Me'));
                $Email->to($user['User']['email']);
                $Email->subject('T\'es un winner !');
                $Email->viewVars(array('user' => $user['User']['username'], 'gift'=>$gift['BigGift']['name'], 'link'=>'http://www.questionme.ch/vouchers/my_vouchers'));
                $Email->emailFormat('html');
                $Email->template('winner');
                $Email->send();
                
                
                $this->Session->setFlash(__('The gift has been given'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
        }

}
