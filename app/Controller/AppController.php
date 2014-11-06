<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

        public $uses = array('Group');
        var $helpers = array('Markdown');
        public $components = array(
            'RequestHandler',
            'DebugKit.Toolbar',
            'Session',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'home', 'admin' => false),
                'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home', 'admin' => false),
                'authError' => 'Tu dois te connecter pour continuer!',
                'flashElement'=>'flash_custom',
                'authenticate' => array(
                    'Form' => array(
                        'passwordHasher' => 'Blowfish',
                       
                    )
                ),
                'authorize' => array('Controller'),
               // 'Facebook.Connect' => array('model' => 'User')
            ),
        );

        public function beforeFilter() {
                
                
                
                $this->Auth->allow('login', 'display', 'sendmail', 'register', 'gethome', 'recover', 'contact');

                if (isset($this->request->params['admin']) && $this->request->params['admin'] == true) {
                        $this->layout = 'backoffice';
                        if ($this->Auth->user('group_id') == 1) {

                                $this->set('header', 'header_admin');
                        } else {
                                $this->set('header', 'header');
                        }
                } else {
                        $this->layout = 'default';
                        if ($this->Auth->user('group_id') == 2) {
                                $this->set('header', 'header_gamer');
                        } else {
                                $this->set('header', 'header_anonymous');
                        }
                }
                
        }

//        function afterFacebookLogin() {
//                //Logic to happen after successful facebook login.
//                $this->Auth->allow('play');
//                $this->redirect('/questions/play');
//        }

        public function isAuthorized($user) {
                // Admin can access every action
                $actions = $this->Session->read('actions');

                if ($this->Auth->user('group_id') == 1) {
                        return true;
                } else if ($this->Auth->user('group_id') == 2) {
                        return in_array($this->params['controller'] . '/' . $this->params['action'], $actions);
                }

                return false;
        }

}
