<?php
App::uses('AppController', 'Controller');
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

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Gift->recursive = 0;
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
		$this->set('gift', $this->Gift->find('first', $options));
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
				$this->Session->setFlash(__('The gift has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gift could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		}
		$customers = $this->Gift->Customer->find('list');
		$qdays = $this->Gift->Qday->find('list');
		$users = $this->Gift->User->find('list');
		$this->set(compact('customers', 'qdays', 'users'));
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
				$this->Session->setFlash(__('The gift has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gift could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Gift.' . $this->Gift->primaryKey => $id));
			$this->request->data = $this->Gift->find('first', $options);
		}
		$customers = $this->Gift->Customer->find('list');
		$qdays = $this->Gift->Qday->find('list');
		$users = $this->Gift->User->find('list');
		$this->set(compact('customers', 'qdays', 'users'));
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
			$this->Session->setFlash(__('Gift deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Gift was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
