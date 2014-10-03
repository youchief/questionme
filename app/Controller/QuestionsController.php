<?php

App::uses('AppController', 'Controller');

/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

        var $uses = array('Question', 'UsersChoice', 'Qday');
        var $helper = array('Time');

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator');

        public function play() {
                $this->layout = 'game';


                //qday info
                $now = date('Y-m-d H:i');
                $qday = $this->Qday->find('first', array('conditions' => array('Qday.start <' => $now, 'Qday.end >' => $now)));

                //user info
                $user = $this->Question->Choice->User->findById($this->Auth->user('id'));
                
                //question repondu aujourd hui
                $response_today = $this->UsersChoice->find('all', array('conditions'=>
                    array(
                        'UsersChoice.user_id'=>$user['User']['id'],
                        'UsersChoice.created >'=>  $qday['Qday']['start'],
                        'UsersChoice.created <'=>$qday['Qday']['end'],
                        )
                    ));  
                
                
                
                
                $nb_answer_today = count($response_today); 
                
                
                //get already choices
                $questions_id = array();
                foreach ($user['Choice'] as $choice) {
                        $questions_id[] = $choice['question_id'];
                }

                $questions_fix = $this->Question->find('all', array('conditions' => array(
                                "NOT" => array("Question.id" => $questions_id),
                                'Question.question_type_id' => 2
                                ),
                                'limit'=>$qday['Qday']['nb_qfixe']
                        )
                );
                
                $questions_mobile = $this->Question->find('all', array('conditions' => array(
                                "NOT" => array("Question.id" => $questions_id),
                                'Question.question_type_id' => 3
                                ),
                                'limit'=>$qday['Qday']['nb_qmobile']
                        )
                );
                
                
                $questions = array_merge($questions_fix, $questions_mobile);
                                

                if (empty($questions)) {
                        $this->Session->setFlash(__('Vous avez répondu à toutes les questions aujourd\'hui!'), 'default', array('class' => 'alert alert-danger'));
                        $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
                }



                $this->set('questions', $questions);


                if ($this->request->is('post')) {
                        debug($this->request->data);
                        /*
                        $user_choices = array();
                        $i = 0;
                        foreach ($this->request->data as $choice) {

                                $user_choices[$i]['user_id'] = $this->Auth->user('id');
                                $user_choices[$i]['choice_id'] = $choice;
                                $i++;
                        }
                        
                        
                        if ($this->UsersChoice->saveMany($user_choices)) {
                                $this->Session->setFlash(__('Merci d\'avoir particpé'), 'default', array('class' => 'alert alert-success'));
                                $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
                        }
                         * 
                         */
                }
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->Question->recursive = 0;
                $this->set('questions', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->Question->exists($id)) {
                        throw new NotFoundException(__('Invalid question'));
                }
                $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
                $this->set('question', $this->Question->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->Question->create();
                        if ($this->Question->save($this->request->data)) {
                                $this->Session->setFlash(__('The question has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                $questionTypes = $this->Question->QuestionType->find('list');
                $orders = $this->Question->Order->find('list');
                $regions = $this->Question->Region->find('list');
                $this->set(compact('questionTypes', 'orders', 'regions'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->Question->exists($id)) {
                        throw new NotFoundException(__('Invalid question'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Question->save($this->request->data)) {
                                $this->Session->setFlash(__('The question has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
                        $this->request->data = $this->Question->find('first', $options);
                }
                $questionTypes = $this->Question->QuestionType->find('list');
                $orders = $this->Question->Order->find('list');
                $regions = $this->Question->Region->find('list');
                $this->set(compact('questionTypes', 'orders', 'regions'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->Question->id = $id;
                if (!$this->Question->exists()) {
                        throw new NotFoundException(__('Invalid question'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->Question->delete()) {
                        $this->Session->setFlash(__('Question deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Question was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

}
