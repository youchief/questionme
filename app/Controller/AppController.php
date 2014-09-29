<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

        public $helpers = array('Markdown');
        public $components = array(
            'RequestHandler',
            'DebugKit.Toolbar',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'users', 'action' => 'welcome', 'admin' => true),
                'logoutRedirect' => array(
                    'controller' => 'users',
                    'action' => 'login',
                    'admin' => true,
                ),
                'authenticate' => array(
                    'Form' => array(
                        'passwordHasher' => 'Blowfish'
                    )
                ),
                'authorize' => array('Controller')
            ),
        );

        public function beforeFilter() {
                
                $this->Auth->allow('login', 'display', 'sendmail');
               
                if (isset($this->request->params['admin']) && $this->request->params['admin'] == true) {
                        $this->layout = 'backoffice';
                        if ($this->Auth->user('group_id') == 1) {
                               
                                $this->set('header', 'header_admin');
                        } else {
                                $this->set('header', 'header');
                        }
                }else{
                        $this->layout = 'default';
                }

        }

        public function isAuthorized($user) {
                // Admin can access every action
                if ($user['group_id'] == 1) {
                        return true;
                }
                return false;
        }

}
