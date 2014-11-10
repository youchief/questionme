<?php

App::uses('AppController', 'Controller');

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
                $this->set(compact('qweeks'));
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
                $this->set(compact('qweeks'));
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
                $this->BigGift->id = $gift_id;
                $this->BigGift->saveField('winner_id', $user_id);
                $this->Session->setFlash(__('The gift has been given'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
        }

}
