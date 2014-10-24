<?php

App::uses('AppController', 'Controller');

/**
 * Queries Controller
 *
 * @property Query $Query
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QueriesController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');
        public $uses = array('Query', 'Profile');

        public function admin_wizard($question_id) {
                if ($this->request->is('post')) {
                        $this->Query->create();
                        $this->request->data['Query']['question_id'] = $question_id;
                        if ($this->Query->save($this->request->data)) {
                                $this->Session->setFlash(__('The query has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'wizard', $question_id));
                        } else {
                                $this->Session->setFlash(__('The query could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                
                $this->Query->Question->Behaviors->attach('Containable');
                $values = $this->Query->Question->find('all', array(
                    'contain' => array(
                        'Choice' => array(
                            'fields' => array('Choice.response')
                        )
                    ),
                    'fields' => array('Question.question'),
                    'conditions' => array('Question.question_type_id' => 1)
                ));

                $quest = array();
                $choices = array();
                foreach ($values as $q) {
                        $quest[$q['Question']['question']] = $q['Question']['question'];

                        foreach ($q['Choice'] as $c) {
                                $choices[$c['response']] = $c['response'];
                        }
                }
                //$values = $this->Query->Question->Choice->find('list', );
                $questions = $this->Query->Question->find('list');
                $this->set(compact('questions'));
                $this->set(compact('quest'));
                $this->set(compact('choices'));
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->Query->recursive = 0;
                $this->set('queries', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->Query->exists($id)) {
                        throw new NotFoundException(__('Invalid query'));
                }
                $options = array('conditions' => array('Query.' . $this->Query->primaryKey => $id));
                $this->set('query', $this->Query->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->Query->create();
                        if ($this->Query->save($this->request->data)) {
                                $this->Session->setFlash(__('The query has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The query could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }



                $this->Query->Question->Behaviors->attach('Containable');
                $values = $this->Query->Question->find('all', array(
                    'contain' => array(
                        'Choice' => array(
                            'fields' => array('Choice.response')
                        )
                    ),
                    'fields' => array('Question.question'),
                    'conditions' => array('Question.question_type_id' => 1)
                ));

                $quest = array();
                $choices = array();
                foreach ($values as $q) {
                        $quest[$q['Question']['question']] = $q['Question']['question'];

                        foreach ($q['Choice'] as $c) {
                                $choices[$c['response']] = $c['response'];
                        }
                }
                //$values = $this->Query->Question->Choice->find('list', );
                $questions = $this->Query->Question->find('list');
                $this->set(compact('questions'));
                $this->set(compact('quest'));
                $this->set(compact('choices'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->Query->exists($id)) {
                        throw new NotFoundException(__('Invalid query'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Query->save($this->request->data)) {
                                $this->Session->setFlash(__('The query has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The query could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('Query.' . $this->Query->primaryKey => $id));
                        $this->request->data = $this->Query->find('first', $options);
                }
                $questions = $this->Query->Question->find('list');
                $this->set(compact('questions'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->Query->id = $id;
                if (!$this->Query->exists()) {
                        throw new NotFoundException(__('Invalid query'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->Query->delete()) {
                        $this->Session->setFlash(__('Query deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Query was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

}
