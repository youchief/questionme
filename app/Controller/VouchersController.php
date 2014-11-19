<?php

App::uses('AppController', 'Controller');

/**
 * Vouchers Controller
 *
 * @property Voucher $Voucher
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class VouchersController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');
        public $uses = array('Voucher', 'User', 'UserVoucher', 'Gift', 'BigGift');

        public function my_vouchers() {

                $this->User->Behaviors->attach('Containable');

                $user = $this->User->find('all', array(
                    'conditions' => array('User.id' => $this->Auth->user('id')),
                    'contain' => array(
                        'Gift' => array(
                            'conditions' => array('Gift.used' => null)
                        ),
                        'Voucher' => array(
                            'conditions' => array('UserVoucher.used' => null)
                        ),
                        'BigGift' => array(
                            'conditions' => array('BigGift.used' => null)
                        )
                    )
                        )
                );

                $this->_delete_double();

                $this->set('user', $user[0]);
        }
        
        
        public function _delete_double() {
                
                $uvs = $this->UserVoucher->find('all', array('conditions'=>array('UserVoucher.user_id'=>$this->Auth->user('id'))));
                $id_voucher = 0;
                foreach($uvs as $uv){          
                        if($id_voucher == $uv['UserVoucher']['voucher_id']){
                                $this->UserVoucher->delete($uv['UserVoucher']['id']);
                                $this->redirect('my_vouchers');
                        }
                        $id_voucher = $uv['UserVoucher']['voucher_id'];
                }
                
        }       
        
        
        
        

        public function use_it($id = null) {
                if (!$this->Voucher->exists($id)) {
                        throw new NotFoundException(__('Invalid voucher'));
                }

                if ($this->request->is('post')) {
                        $user_voucher = $this->UserVoucher->find('first', array('conditions' => array(
                                'UserVoucher.user_id' => $this->Auth->user('id'),
                                'UserVoucher.voucher_id' => $id,
                                'UserVoucher.used' => null
                        )));

                        if (empty($user_voucher)) {
                                $this->Session->setFlash(__('Bon invalide'), 'default', array('class' => 'alert alert-danger'));
                                $this->redirect($this->referer());
                        } else {
                                $customer_voucher = $this->Voucher->Customer->findById($user_voucher['Voucher']['customer_id']);
                                if ($this->request->data['Voucher']['code'] == $customer_voucher['Customer']['code']) {
                                        $this->UserVoucher->id = $user_voucher['UserVoucher']['id'];
                                        $this->UserVoucher->saveField('used', date('Y-m-d H:i:s'));
                                        $this->Session->setFlash(__('Merci de faire la promotion !'), 'message_success');
                                        $this->redirect(array('action' => 'partner', $user_voucher['UserVoucher']['id']));
                                } else {
                                        $this->Session->setFlash(__('Code erroné ! Essaie encore !'), 'default', array('class' => 'alert alert-danger'));
                                        $this->redirect($this->referer());
                                }
                        }
                }


                $options = array('conditions' => array('Voucher.' . $this->Voucher->primaryKey => $id));
                $this->set('voucher', $this->Voucher->find('first', $options));
        }

        public function partner($user_voucher_id) {
                $uv = $this->UserVoucher->findById($user_voucher_id);
                $voucher = $this->Voucher->findById($uv['UserVoucher']['voucher_id']);
                $this->set('voucher', $voucher['Voucher']['name']);
                $this->set('customer', $voucher['Customer']['name']);
                $this->set('img', $voucher['Voucher']['image']);
                $this->set('used', $uv['UserVoucher']['used']);
        }

        public function view($id = null) {
                if (!$this->Voucher->exists($id)) {
                        throw new NotFoundException(__('Invalid voucher'));
                }
                $options = array('conditions' => array('Voucher.' . $this->Voucher->primaryKey => $id));
                $this->set('voucher', $this->Voucher->find('first', $options));
        }

        public function delete($voucher_id) {
                $this->UserVoucher->delete($voucher_id);
                $this->Session->setFlash(__('Bon effacé'), 'message_success');
                $this->redirect(array('action' => 'my_vouchers'));
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->Voucher->recursive = 0;
                $this->set('vouchers', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->Voucher->exists($id)) {
                        throw new NotFoundException(__('Invalid voucher'));
                }
                $options = array('conditions' => array('Voucher.' . $this->Voucher->primaryKey => $id));
                $this->set('voucher', $this->Voucher->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->Voucher->create();
                        if ($this->Voucher->save($this->request->data)) {
                                $this->Session->setFlash(__('The voucher has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The voucher could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                $customers = $this->Voucher->Customer->find('list');
                $this->set(compact('customers'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->Voucher->exists($id)) {
                        throw new NotFoundException(__('Invalid voucher'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Voucher->save($this->request->data)) {
                                $this->Session->setFlash(__('The voucher has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The voucher could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('Voucher.' . $this->Voucher->primaryKey => $id));
                        $this->request->data = $this->Voucher->find('first', $options);
                }
                $customers = $this->Voucher->Customer->find('list');
                $this->set(compact('customers'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->Voucher->id = $id;
                if (!$this->Voucher->exists()) {
                        throw new NotFoundException(__('Invalid voucher'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->Voucher->delete()) {
                        $this->Session->setFlash(__('Voucher deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Voucher was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

}
