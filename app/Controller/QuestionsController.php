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
                        $this->Session->setFlash(__('Pas de jeux aujourd\'hui :-('), 'message_danger');
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



                //remove question fixe not today 
                $questions = $this->_unset_fixe_not_today($questions);


                $questions = $this->_unset_because_user($questions, $user);


                //remove question not good for this user
                $questions = $this->_unset_questions_because_queries($questions, $user);


                //remove question not good because voucher
                $questions = $this->_unset_because_voucher($questions, $user);

                //get user today responce 
                $rest_questions = $this->_get_nb_user_questions($qday);


                //question final user
                $qday_total = $qday['Qday']['nb_qfixe'] + $qday['Qday']['nb_qmobile'];


                /*
                 * adjust mobile and fixe question 
                 */


                $nb_q_mobile = 0;
                foreach ($questions as $question) {
                        if ($question['Question']['question_type_id'] == 3) {
                                $nb_q_mobile++;
                        }
                }
                $diff = $qday['Qday']['nb_qmobile'] - $nb_q_mobile;
                $rest_questions['fixe'] + $diff;
                $rest_questions['mobile'] - $diff;
                $total_rest = $qday_total - ($rest_questions['fixe'] + $rest_questions['mobile']);


                /*
                 * create the final question array
                 */
                $user_questions = array();
                $i = 0;
                $y = 0;
                foreach ($questions as $question) {

                        if (($question['Question']['question_type_id']) == 2 && ($i < $rest_questions['fixe'])) {
                                $user_questions[] = $question;
                                $i++;
                        } else if (($question['Question']['question_type_id'] == 3) && ($y < $rest_questions['mobile'])) {
                                $user_questions[] = $question;
                                $y++;
                        }
                }

                /*
                 * if no more question today -> redirect to home 
                 */
                if (empty($user_questions)) {
                        $this->Session->setFlash(__('Tu as répondu à toutes les questions! Reviens demain pour voir si tu as gagné et recommencer à jouer :)'), 'message_info');
                        $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
                }


                /*
                 * set data to the view
                 */
                $this->set('question', $user_questions[0]);
                $choices = $this->Question->Choice->find('list', array('conditions' => array('Choice.question_id' => $user_questions[0]['Question']['id'])));
                $this->set('choices', $choices);
                $this->set('rest', $total_rest + 1);
                $this->set('qday_total', $qday_total);



                if ($this->request->is('post')) {

                        $already = $this->UsersChoice->find('all', array('conditions' => array('UsersChoice.user_id' => $this->Auth->user('id'), 'UsersChoice.question_id' => $this->request->data['Question']['question'])));

                        if (!empty($already)) {
                                $this->Session->setFlash(__('Tu ne peux pas modifier ta réponse !'), 'message_danger');
                                $this->redirect('play');
                        }


                        $data = array();
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

                                        if ($this->request->data['Question']['final_order_question'] == 1) {
                                                $this->_increment_order($this->request->data['Question']['order_id']);
                                        }

                                        if ($this->request->data['Question']['profile'] == true) {
                                                $this->_create_profile_value($this->request->data['Question']['question'], $this->Auth->user('id'));
                                        }
                                        if (count($user_questions) <= 1) {
                                                $this->_create_voucher();
                                        } else {
                                                if (!empty($this->request->data['Question']['right_choice_id'])) {
                                                        if ($this->request->data['Question']['right_choice_id'] == $this->request->data['Question']['response']) {
                                                                $this->Session->setFlash(__('Bravo! La bonne réponse était:') . " " . $this->request->data['Question']['right_choice_value'], 'message_success');
                                                        } else {
                                                                $this->Session->setFlash(__('Flûte! La bonne réponse était:') . " " . $this->request->data['Question']['right_choice_value'], 'message_danger');
                                                        }
                                                }

                                                $this->redirect(array('action' => 'play'));
                                        }
                                }
                        } else {
                                $this->Session->setFlash(__('Tu dois faire un choix :-/'), 'message_danger');
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

                $question_rest_fix = $qday['Qday']['nb_qfixe'] - $fix;
                $question_rest_mob = $qday['Qday']['nb_qmobile'] - $mob;

                return array('fixe' => $question_rest_fix, 'mobile' => $question_rest_mob);
        }

        public function _unset_because_voucher($questions, $user) {
                $i = 0;
                foreach ($questions as $question) {
                        if (!empty($question['Question']['to_voucher'])) {
                                foreach ($user['Voucher'] as $user_voucher) {
                                        if ($user_voucher['UserVoucher']['voucher_id'] == $question['Question']['to_voucher']) {
                                                if ($question['Question']['to_voucher_status'] == 'used') {
                                                        if ($user_voucher['UserVoucher']['used'] == null) {
                                                                unset($questions[$i]);
                                                        }
                                                } else if ($question['Question']['to_voucher_status'] == 'not_used') {
                                                        if ($user_voucher['UserVoucher']['used'] <> null) {
                                                                unset($questions[$i]);
                                                        }
                                                }
                                        }
                                }


                                //on cherche dans ses bons
                                $id_vouchers = array();
                                foreach ($user['Voucher'] as $voucher) {
                                        $id_vouchers[] = $voucher['UserVoucher']['voucher_id'];
                                }
                                $exist_voucher = array_search($question['Question']['to_voucher'], $id_vouchers);
                                if (!is_int($exist_voucher)) {
                                        unset($questions[$i]);
                                }
                        }
                        $i++;
                }

                return $questions;
        }

        /*
         * unset question because not good for user gender and age
         */

        public function _unset_because_user($questions, $user) {
                $i = 0;
                foreach ($questions as $question) {
                        if (!empty($question['Question']['to_gender'])) {
                                if ($question['Question']['to_gender'] <> $user['User']['sex']) {
                                        unset($questions[$i]);
                                }
                        }
                        $i++;
                }



                $i = 0;
                foreach ($questions as $question) {
                        if (!empty($question['Question']['to_age_start']) && !empty($question['Question']['to_age_start'])) {
                                $user_birthday = strtotime($user['User']['birthday']);
                                if ($user_birthday <= strtotime($question['Question']['to_age_start']) && $user_birthday >= strtotime($question['Question']['to_age_end'])) {
                                        unset($questions[$i]);
                                }
                        }
                        $i++;
                }

                return $questions;
        }

        public function _unset_questions_because_queries($questions, $user) {
                //unset questions for this specific user
                //   debug($user['Profile']);

                $index_q = 0;

                $final_questions = array();
                //debug($questions);
                foreach ($questions as $question) {

                        if (empty($question['Query'])) {
                                $final_questions[] = $question;
                        }


                        foreach ($question['Query'] as $query) {

                                foreach ($user['Profile'] as $profile) {
                                        if ($profile['key'] == $query['key']) {

                                                switch ($query['sign']) {


                                                        case '=':
                                                                if ($query['value'] == $profile['value']) {

                                                                        $final_questions[] = $question;
                                                                }
                                                                break;

                                                        case '>':
                                                                if ($query['value'] > $profile['value']) {
                                                                        $final_questions[] = $question;
                                                                }
                                                                break;

                                                        case '<':
                                                                if ($query['value'] < $profile['value']) {
                                                                        $final_questions[] = $question;
                                                                }
                                                                break;


                                                        case '>=':
                                                                if ($query['value'] >= $profile['value']) {
                                                                        $final_questions[] = $question;
                                                                }
                                                                break;
                                                        case '<=':
                                                                if ($query['value'] <= $profile['value']) {
                                                                        $final_questions[] = $question;
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




                return $final_questions;
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
                            'User' => array('conditions' => array('User.id' => $user_id))
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
                        $this->Session->setFlash('Nickel ! Tu as gagné ' . $day_voucher['Voucher']['name'] . " disponible dans “MES BONS”.
							Demain matin, un tirage au sort déterminera les gagnants pour les cadeaux du jour. Pour voir si tu as gagné, rends-toi dans “MES BONS” !", 'message_success');
                        $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
                }
        }

        public function _increment_order($order_id) {
                $order = $this->Question->Order->findById($order_id);

                $nb_rep = $order['Order']['repondants'] ++;

                if ($nb_rep >= $order['Order']['repondants']) {
                        $this->Question->Order->id = $order_id;
                        $this->Question->Order->set(array(
                            'repondants' => $nb_rep,
                            'active' => 0
                        ));

                        $this->Question->updateAll(
                                array('Question.active' => 0), array('Question.order_id' => $order_id)
                        );
                } else {
                        $this->Question->Order->id = $order_id;
                        $this->Question->Order->set(array(
                            'repondants' => $nb_rep,
                        ));
                }

                $this->Question->Order->save();
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
                $vouchers = $this->Voucher->find('list');
                $this->set(compact('questionTypes', 'orders', 'regions', 'vouchers'));
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->Question->recursive = 0;
                if (!empty($this->request->data['Question']['search'])) {
                        $this->set('questions', $this->Paginator->paginate(array('Question.question LIKE' => "%" . $this->request->data['Question']['search'] . "%")));
                } else {
                        $this->set('questions', $this->Paginator->paginate());
                }
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

        public function admin_export() {
                $questions = $this->Question->find('all', array(
                    'contain' => array(
                        'Choice' => array(
                            'fields' => array('id', 'response'),
                        )
                    )
                        )
                );

                $result = array();

                $i = 0;
                foreach ($questions as $question) {

                       
                        foreach ($question['Choice'] as $choice) {


                                $result[$i]['Question']['question_id'] = $question['Question']['id'];
                                $result[$i]['Question']['question_type_id'] = $question['Question']['question_type_id'];
                                $result[$i]['Question']['date'] = $question['Question']['date'];
                                $result[$i]['Question']['question'] = $question['Question']['question'];
                                $result[$i]['Question']['order_id'] = $question['Question']['order_id'];
                                $result[$i]['Question']['response_type'] = $question['Question']['response_type'];
                                $result[$i]['Question']['choice_id'] = $choice['id'];
                                $result[$i]['Question']['choice'] = $choice['response'];
                                $i++;
                        }
                }


                CakePlugin::load('CsvView');

                $_serialize = 'result';
                $_header = array('Question ID', 'Question Type ID', 'Date', 'Question', 'Order ID', 'Response Type', 'Choice ID', 'Choice');
                $_extract = array('Question.question_id', 'Question.question_type_id', 'Question.date', 'Question.question', 'Question.order_id', 'Question.response_type', 'Question.choice_id', 'Question.choice');
                $_delimiter = ";"; //tab
                $this->response->download('export_questions_qme.csv');
                $this->viewClass = 'CsvView.Csv';
                $this->set(compact('result', '_serialize', '_header', '_extract', '_delimiter'));
        }

        public function admin_preview($id = null) {
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
                                $this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                        }
                }
                $questionTypes = $this->Question->QuestionType->find('list');
                $orders = $this->Question->Order->find('list');
                $regions = $this->Question->Region->find('list');
                $vouchers = $this->Voucher->find('list');
                $this->set(compact('questionTypes', 'orders', 'regions', 'vouchers'));
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
                                $this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
                        }
                } else {
                        $options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
                        $this->request->data = $this->Question->find('first', $options);
                }
                $questionTypes = $this->Question->QuestionType->find('list');
                $orders = $this->Question->Order->find('list');
                $regions = $this->Question->Region->find('list');
                $vouchers = $this->Voucher->find('list');
                $this->set(compact('questionTypes', 'orders', 'regions', 'vouchers'));
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
                $this->Session->setFlash(__('Question was not deleted'), 'default', array('class' => 'alert alert-danger'));
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
                        'UsersChoice.user_id <>' => 1,
                    ),
                    'fields' => array('DISTINCT UsersChoice.user_id'),
                        )
                );



                return $user_played;
        }

}
