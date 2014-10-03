<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
        
        public $uses = array('Group');
        public $helpers = array('Markdown');
        public $components = array(
            'RequestHandler',
            'DebugKit.Toolbar',
            'Session',
            'Auth' => array(
                'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'admin' => false),
                'loginRedirect' => array('controller' => 'pages', 'action' => 'display', 'admin' => false),
                'authenticate' => array(
                    'Form' => array(
                        'passwordHasher' => 'Blowfish'
                    )
                ),
                'authorize' => array('Controller')
            ),
        );

        public function beforeFilter() {

                $this->Auth->allow('login', 'display', 'sendmail', 'register', 'gethome', 'recover');

                if (isset($this->request->params['admin']) && $this->request->params['admin'] == true) {
                        $this->layout = 'backoffice';
                        if ($this->Auth->user('group_id') == 1) {

                                $this->set('header', 'header_admin');
                        } else {
                                $this->set('header', 'header');
                        }
                } else if ($this->here == '/questionme/') {
                        $this->layout = 'landing_page';
                }else{
                        $this->layout = 'default';
                        if($this->Auth->user('group_id')==2){
                                $this->set('header', 'header_gamer');
                        }else{
                                $this->set('header', 'header_anonymous');
                        }
                        
                        
                }
        }

        public function isAuthorized($user) {
                // Admin can access every action
               
                $actions = $this->Session->read('actions');
                
                if ($this->Auth->user('group_id') == 1) {
                        return true;
                } else if ($this->Auth->user('group_id') == 2){
                        return in_array($this->params['controller'] . '/' . $this->params['action'], $actions);
                }
                
                return false;
        }

}
