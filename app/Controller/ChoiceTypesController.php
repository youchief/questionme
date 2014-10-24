<?php

App::uses('AppController', 'Controller');

/**
 * ChoiceTypes Controller
 *
 * @property ChoiceType $ChoiceType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChoiceTypesController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');


        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->ChoiceType->recursive = 0;
                $this->set('choiceTypes', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->ChoiceType->exists($id)) {
                        throw new NotFoundException(__('Invalid choice type'));
                }
                $options = array('conditions' => array('ChoiceType.' . $this->ChoiceType->primaryKey => $id));
                $this->set('choiceType', $this->ChoiceType->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->ChoiceType->create();
                        if ($this->ChoiceType->save($this->request->data)) {
                                $this->Session->setFlash(__('The choice type has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The choice type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->ChoiceType->exists($id)) {
                        throw new NotFoundException(__('Invalid choice type'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->ChoiceType->save($this->request->data)) {
                                $this->Session->setFlash(__('The choice type has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The choice type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('ChoiceType.' . $this->ChoiceType->primaryKey => $id));
                        $this->request->data = $this->ChoiceType->find('first', $options);
                }
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->ChoiceType->id = $id;
                if (!$this->ChoiceType->exists()) {
                        throw new NotFoundException(__('Invalid choice type'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->ChoiceType->delete()) {
                        $this->Session->setFlash(__('Choice type deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Choice type was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

}
