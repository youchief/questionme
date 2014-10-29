<?php

App::uses('AppController', 'Controller');

/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

        var $uses = array('Question', 'UsersChoice', 'Qday', 'UserVoucher', 'Voucher', 'Profile', 'User');
        var $helper = array('Time');

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator');

        public function play() {
                //qday info
                $now = date('Y-m-d H:i');
                $qday = $this->Qday->find('first', array('conditions' => array('Qday.start <' => $now, 'Qday.end >' => $now)));

                if (empty($qday)) {
                        $this->Session->setFlash(__('Pas de jeux aujourd\'hui :-('), 'default', array('class' => 'alert alert-danger'));
                        $this->redirect($this->referer());
                }

                //user info
                $user = $this->Question->Choice->User->findById($this->Auth->user('id'));

                //get already choices
                $questions_id = array();
                foreach ($user['Choice'] as $choice) {
                        $questions_id[] = $choice['question_id'];
                }
                //question list whith conditons
                $questions = $this->Question->find('all', array('conditions' => array(
                        "NOT" => array("Question.id" => $questions_id),
                        'Question.active' => 1,
                    //'QuestionRegion.region_id' => $user['User']['region_id']
                    )
                        )
                );

                //debug($questions);
                //remove question fixe not today 
                $questions = $this->_unset_fixe_not_today($questions);



                //remove question not good for this user
                $questions = $this->_unset_questions_because_queries($questions, $user);


                //get user today responce 
                $rest_questions = $this->_get_nb_user_questions($qday);
                //debug($rest_questions);
                //question final user
                $qday_total = $qday['Qday']['nb_qfixe'] + $qday['Qday']['nb_qmobile'] + $qday['Qday']['nb_qprofile'];

                $total_rest = $qday_total - ($rest_questions['fixe'] + $rest_questions['mobile'] + $rest_questions['profile']);


                $user_questions = array();
                $i = 0;
                $y = 0;
                $z = 0;
                foreach ($questions as $question) {

                        if (($question['Question']['question_type_id']) == 2 && ($i < $rest_questions['fixe'])) {
                                $user_questions[] = $question;
                                $i++;
                        } else if (($question['Question']['question_type_id'] == 3) && ($y < $rest_questions['mobile'])) {
                                $user_questions[] = $question;
                                $y++;
                        } else if (($question['Question']['question_type_id'] == 1) && ($z < $rest_questions['profile'])) {
                                $user_questions[] = $question;
                                $z++;
                        }
                }


                if (empty($user_questions)) {
                        $this->Session->setFlash(__('Vous avez répondu à toutes les questions aujourd\'hui!'), 'flash_custom');
                        $this->redirect(array('controller' => 'pages', 'action' => 'display', 'home'));
                }

                $this->set('question', $user_questions[0]);
                $choices = $this->Question->Choice->find('list', array('conditions' => array('Choice.question_id' => $user_questions[0]['Question']['id'])));
                $this->set('choices', $choices);
                $this->set('rest', $total_rest);
                $this->set('qday_total', $qday_total);





                $data = array();
                if ($this->request->is('post')) {
                        if (!empty($this->request->data['Question']['response'])) {
                                if ($this->request->data['Question']['response_type'] == 'CHECKBOX') {
                                        $i = 0;
                                        foreach ($this->request->data['Question']['response'] as $user_choice) {
                                                $data[$i]['user_id'] = $this->Auth->user('id');
                                                $data[$i]['choice_id'] = $user_choice;
                                                $data[$i]['question_id'] = $this->request->data['Question']['question'];
                                                $data[$i]['question_type_id'] = $this->request->data['Question']['type'];
                                                $i++;
                                        }
                                } else {
                                        $data['choice_id'] = $this->request->data['Question']['response'];
                                        $data['user_id'] = $this->Auth->user('id');
                                        $data['question_id'] = $this->request->data['Question']['question'];
                                        $data['question_type_id'] = $this->request->data['Question']['type'];
                                        if (!empty($this->request->data['Question']['free'])) {
                                                $data['free'] = $this->request->data['Question']['free'];
                                        }
                                }

                                if ($this->UsersChoice->saveAll($data)) {
                                        if ($this->request->data['Question']['type'] == 1) {
                                                $this->_create_profile_value($this->request->data['Question']['question'], $this->Auth->user('id'));
                                        }
                                        $rest = $this->_get_nb_user_questions($qday);

                                        if (($rest['fixe'] <= 0) && ($rest['mobile'] <= 0) && ($rest['profile'] <= 0)) {
                                                //debug('hello');
                                                //$this->Session->setFlash(__('Merci d\'avoir particpé'), 'default', array('class' => 'alert alert-success'));
                                                $this->_create_voucher();
                                                //$this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
                                        } else {
                                                $this->redirect(array('action' => 'play'));
                                        }
                                }
                        } else {
                                $this->Session->setFlash(__('Vous devez choisir quelque chose :-/'), 'flash_custom', array('class' => 'alert alert-danger'));
                        }
                }
        }

        public function _unset_fixe_not_today($questions) {
                $i = 0;
                foreach ($questions as $question) {
                        if ($question['Question']['question_type_id'] == 2) {
                                if ($question['Question']['date'] <> date('Y-m-d')) {
                                        unset($questions[$i]);
                                }
                        }
                        $i++;
                }

                return $questions;
        }

        public function _get_nb_user_questions($qday) {

                $q_fixe = $this->UsersChoice->find('all', array(
                    'conditions' => array(
                        'UsersChoice.created >' => $qday['Qday']['start'],
                        'UsersChoice.created <' => $qday['Qday']['end'],
                        'UsersChoice.user_id' => $this->Auth->user('id'),
                        'UsersChoice.question_type_id' => 2
                    ),
                    'fields' => array('DISTINCT UsersChoice.question_id'),
                        )
                );


                $q_profile = $this->UsersChoice->find('all', array(
                    'conditions' => array(
                        'UsersChoice.created >' => $qday['Qday']['start'],
                        'UsersChoice.created <' => $qday['Qday']['end'],
                        'UsersChoice.user_id' => $this->Auth->user('id'),
                        'UsersChoice.question_type_id' => 1
                    ),
                    'fields' => array('DISTINCT UsersChoice.question_id'),
                        )
                );


                $q_mobile = $this->UsersChoice->find('all', array(
                    'conditions' => array(
                        'UsersChoice.created >' => $qday['Qday']['start'],
                        'UsersChoice.created <' => $qday['Qday']['end'],
                        'UsersChoice.user_id' => $this->Auth->user('id'),
                        'UsersChoice.question_type_id' => 3
                    ),
                    'fields' => array('DISTINCT UsersChoice.question_id'),
                        )
                );


                $fix = count($q_fixe);
                $mob = count($q_mobile);
                $profile = count($q_profile);

                $question_rest_fix = $qday['Qday']['nb_qfixe'] - $fix;
                $question_rest_mob = $qday['Qday']['nb_qmobile'] - $mob;
                $question_rest_profile = $qday['Qday']['nb_qprofile'] - $profile;

                return array('fixe' => $question_rest_fix, 'mobile' => $question_rest_mob, 'profile' => $question_rest_profile);
        }

        public function _unset_questions_because_queries($questions, $user) {
                //unset questions for this specific user


                $index_q = 0;
                foreach ($questions as $question) {
                        foreach ($question['Query'] as $query) {
                                foreach ($user['Profile'] as $profile) {
                                        if ($profile['key'] == $query['key']) {
                                                switch ($query['sign']) {
                                                        case '=':
                                                                if (!$query['value'] == $profile['value']) {
                                                                        unset($questions[$index_q]);
                                                                }
                                                                break;

                                                        case '>':
                                                                if (!$query['value'] > $profile['value']) {
                                                                        unset($questions[$index_q]);
                                                                }
                                                                break;

                                                        case '<':
                                                                if (!$query['value'] < $profile['value']) {
                                                                        unset($questions[$index_q]);
                                                                }
                                                                break;


                                                        case '>=':
                                                                if (!$query['value'] >= $profile['value']) {
                                                                        unset($questions[$index_q]);
                                                                }
                                                                break;
                                                        case '<=':
                                                                if (!$query['value'] <= $profile['value']) {
                                                                        unset($questions[$index_q]);
                                                                }
                                                                break;

                                                        default:
                                                                break;
                                                }
                                        }
                                }
                        }
                        $index_q++;
                }

                return $questions;
        }

        public function _create_user_choice($data) {
                //création d'un tableau de choix utilisateur
                $user_choices = array();
                $i = 0;
                foreach ($data as $choice) {
                        $user_choices[$i]['user_id'] = $this->Auth->user('id');
                        $user_choices[$i]['choice_id'] = $choice;
                        $i++;
                }

                return $user_choices;
        }

        public function _create_profile_value($question_id, $user_id) {
                $values = $this->Question->find('first', array(
                    'conditions' => array('Question.id' => $question_id),
                    'contain' => array(
                        'Choice' => array(
                            //'conditions' => array("IN" => array("Choice.id" => $choices)),
                            'User'
                        )
                    )
                        )
                );
                $data = array();
                $i = 0;
                foreach ($values['Choice'] as $choice) {

                        if (!empty($choice['User'])) {
                                $data[$i]['key'] = $values['Question']['question'];
                                $data[$i]['value'] = $choice['response'];
                                $data[$i]['user_id'] = $user_id;
                        }
                        $i++;
                }
                $this->Profile->saveAll($data);
        }

        public function _create_voucher() {


                $day_voucher = $this->Voucher->findByDate(date('Y-m-d'));

                if (empty($day_voucher)) {
                        $this->Session->setFlash(__('Pas de bon de réduction aujourd\'hui :-('), 'default', array('class' => 'alert alert-danger'));
                        $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
                } else {
                        $this->UserVoucher->set(array(
                            'user_id' => $this->Auth->user('id'),
                            'voucher_id' => $day_voucher['Voucher']['id']
                        ));
                        $this->UserVoucher->save();
                        $this->Session->setFlash(__('Vous avez obtenu: ') . $day_voucher['Voucher']['name'], 'default', array('class' => 'alert alert-warning'));
                        $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
                }
        }

        public function admin_wizard() {
                if ($this->request->is('post')) {
                        $this->Question->create();
                        if ($this->Question->save($this->request->data)) {
                                $this->Session->setFlash(__('The question has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('controller' => 'queries', 'action' => 'wizard', $this->Question->getLastInsertID()));
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

        public function admin_get_nb_today_player() {

                $now = date('Y-m-d H:i');
                $qday = $this->Qday->find('first', array('conditions' => array('Qday.start <' => $now, 'Qday.end >' => $now)));
                $result['user'] = 0;
                $result['qfixe'] = 0;
                $result['qmobile'] = 0;
                $result['qprofile'] = 0;

                if (!empty($qday)) {
                        $user_played = $this->UsersChoice->find('all', array(
                            'conditions' => array(
                                'UsersChoice.created >' => $qday['Qday']['start'],
                                'UsersChoice.created <' => $qday['Qday']['end'],
                            ),
                            'fields' => array('DISTINCT UsersChoice.user_id'),
                                )
                        );

                        $q_fixe = $this->UsersChoice->find('all', array(
                            'conditions' => array(
                                'UsersChoice.created >' => $qday['Qday']['start'],
                                'UsersChoice.created <' => $qday['Qday']['end'],
                                'UsersChoice.question_type_id' => 2
                            ),
                            'fields' => array('DISTINCT UsersChoice.user_id'),
                                )
                        );


                        $q_profile = $this->UsersChoice->find('all', array(
                            'conditions' => array(
                                'UsersChoice.created >' => $qday['Qday']['start'],
                                'UsersChoice.created <' => $qday['Qday']['end'],
                                'UsersChoice.question_type_id' => 1
                            ),
                            'fields' => array('DISTINCT UsersChoice.user_id'),
                                )
                        );


                        $q_mobile = $this->UsersChoice->find('all', array(
                            'conditions' => array(
                                'UsersChoice.created >' => $qday['Qday']['start'],
                                'UsersChoice.created <' => $qday['Qday']['end'],
                                'UsersChoice.question_type_id' => 3
                            ),
                            'fields' => array('DISTINCT UsersChoice.user_id'),
                                )
                        );


                        $result['user'] = count($user_played);
                        $result['qfixe'] = count($q_fixe);
                        $result['qmobile'] = count($q_mobile);
                        $result['qprofile'] = count($q_profile);
                }



                return $result;
        }

        public function admin_summary($question_id) {
                $question = $this->Question->find('first', array(
                    'conditions' => array('Question.id' => $question_id),
                    'contain' => array('Choice' => array(
                            'User'
                        ),
                    ),
                        )
                );

                $this->set('question', $question);
        }

        public function admin_get_nb_user_per_question($question_id) {
                $user_played = $this->UsersChoice->find('count', array(
                    'conditions' => array(
                        'UsersChoice.question_id' => $question_id,
                       
                    ),
                    'fields' => array('DISTINCT UsersChoice.user_id'),
                        )
                );
                
                return $user_played;
        }

}
