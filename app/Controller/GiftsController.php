<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Gifts Controller
 *
 * @property Gift $Gift
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GiftsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');
    public $uses = array('Gift', 'UsersChoice', 'User');

    public function use_it($id = null) {
        if (!$this->Gift->exists($id)) {
            throw new NotFoundException(__('Invalid BigGift'));
        }

        if ($this->request->is('post')) {
            $big = $this->Gift->findById($id);

            if ($big['Gift']['used'] <> null) {
                $this->Session->setFlash(__('Code déjà utilisé!'), 'default', array('class' => 'alert alert-danger'));
                $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
            }

            if ($this->request->data['Gift']['code'] == $big['Customer']['code']) {
                $this->Gift->id = $id;
                $this->Gift->saveField('used', date('Y-m-d H:i:s'));
                $this->Session->setFlash(__('Merci d\'offir le cadeau !'), 'message_success');
                $this->redirect(array('action' => 'partner', $id));
            } else {
                $this->Session->setFlash(__('Code erroné ! Essaie encore !'), 'default', array('class' => 'alert alert-danger'));
                $this->redirect($this->referer());
            }
        }


        $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
        $this->set('gift', $this->Gift->find('first', $options));
    }

    public function partner($gift_id) {
        $gift = $this->Gift->findById($gift_id);
        $this->set('voucher', $gift['Gift']['name']);
        $this->set('customer', $gift['Customer']['name']);
        $this->set('img', $gift['Gift']['media']);
        $this->set('used', $gift['Gift']['used']);

        $this->render('/vouchers/partner');
    }

    public function view($id = null) {
        if (!$this->Gift->exists($id)) {
            throw new NotFoundException(__('Invalid gift'));
        }
        $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
        $gift = $this->Gift->find('first', $options);
        $this->set('gift', $gift);
    }

    public function delete($gift_id) {
        $this->Gift->id = $gift_id;
        $this->Gift->saveField('winner_id', null);
        $this->redirect(array('controller' => 'vouchers', 'action' => 'my_vouchers'));
        $this->Session->setFlash(__('Cadeau effacé !'), 'message_danger');
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Gift->recursive = 1;
        $this->set('gifts', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Gift->exists($id)) {
            throw new NotFoundException(__('Invalid gift'));
        }
        $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
        $gift = $this->Gift->find('first', $options);
        $winner = array('User' => array('username' => 'no body'));
        if (!empty($gift['Gift']['winner_id'])) {
            $winner = $this->User->findById($gift['Gift']['winner_id']);
        }
        $this->set('winner', $winner);
        $this->set('gift', $gift);
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Gift->create();
            if ($this->Gift->save($this->request->data)) {
                $this->Session->setFlash(__('The gift has been saved'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gift could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        }
        $customers = $this->Gift->Customer->find('list');
        $qdays = $this->Gift->Qday->find('list');
        $this->set(compact('customers', 'qdays'));
    }

    public function admin_duplicate($id) {
        $gift = $this->Gift->findById($id);
        $new_gift = array();
        $new_gift['Gift']['name'] = $gift['Gift']['name'];
        $new_gift['Gift']['description'] = $gift['Gift']['description'];
        $new_gift['Gift']['validity'] = $gift['Gift']['validity'];
        $new_gift['Gift']['conditions'] = $gift['Gift']['conditions'];
        $new_gift['Gift']['media'] = $gift['Gift']['media'];
        $new_gift['Gift']['customer_id'] = $gift['Gift']['customer_id'];
        $new_gift['Gift']['qday_id'] = $gift['Gift']['qday_id'];

        $this->Gift->Behaviors->unload('Uploader.Attachment');
        $this->Gift->Behaviors->unload('Uploader.FileValidation');
        $this->Gift->create();
        if ($this->Gift->save($new_gift)) {
            $this->Session->setFlash(__('The gift has been saved'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The gift could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
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
        if (!$this->Gift->exists($id)) {
            throw new NotFoundException(__('Invalid gift'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Gift->save($this->request->data)) {
                $this->Session->setFlash(__('The gift has been saved'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The gift could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
            }
        } else {
            $options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
            $this->request->data = $this->Gift->find('first', $options);
        }
        $customers = $this->Gift->Customer->find('list');
        $qdays = $this->Gift->Qday->find('list');
        $this->set(compact('customers', 'qdays'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Gift->id = $id;
        if (!$this->Gift->exists()) {
            throw new NotFoundException(__('Invalid gift'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Gift->delete()) {
            $this->Session->setFlash(__('Gift deleted'), 'default', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Gift was not deleted'), 'default', array('class' => 'alert alert-error'));
        return $this->redirect(array('action' => 'index'));
    }

    public function admin_draw($id) {
        $gift = $this->Gift->findById($id);

        $user_choices = $this->UsersChoice->find('all', array(
            'conditions' => array(
                'UsersChoice.created >' => $gift['Qday']['start'],
                'UsersChoice.created <' => $gift['Qday']['end'],
            ),
            'fields' => array('DISTINCT UsersChoice.question_id', 'UsersChoice.user_id'),
                )
        );

        shuffle($user_choices);

        $winner = $this->UsersChoice->User->findById($user_choices[0]['UsersChoice']['user_id']);

        $this->set('user', $winner);
        $this->set('gift_id', $id);
    }

    public function admin_validate($user_id, $gift_id) {
        $gift = $this->Gift->findById($gift_id);
        $user = $this->User->findById($user_id);

        $this->Gift->id = $gift_id;
        $this->Gift->saveField('winner_id', $user_id);
        $this->Session->setFlash(__('The gift has been given'), 'default', array('class' => 'alert alert-success'));

        $Email = new CakeEmail('smtp');
        $Email->from(array('hello@questoionme.ch' => 'Question Me'));
        $Email->to($user['User']['email']);
        $Email->subject('T\'es un winner !');
        $Email->viewVars(array('user' => $user['User']['username'], 'gift' => $gift['Gift']['name'], 'link' => 'http://www.questionme.ch/vouchers/my_vouchers'));
        $Email->emailFormat('html');
        $Email->template('winner');
        $Email->send();

        $this->redirect(array('action' => 'index'));
    }

    public function admin_give_to_3xw($gift_id, $user_id) {
        $this->Gift->id = $gift_id;
        $this->Gift->saveField('winner_id', $user_id);
        $this->Session->setFlash(__('Oui... vous avez fait le bon choix !'), 'default', array('class' => 'alert alert-success'));
        if($user_id == 41){
                $xw = 'cycy.png';
        }else{
                 $xw = 'dada.png';
        }
        
        $this->redirect(array('action'=>'merci', $xw));
    }
    
    
    public function admin_merci($xw){
            $this->set('xw', $xw);
    }

}
