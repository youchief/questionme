<?php
App::uses('AppController', 'Controller');
/**
 * CustomerTypes Controller
 *
 * @property CustomerType $CustomerType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CustomerTypesController extends AppController {

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
		$this->CustomerType->recursive = 0;
		$this->set('customerTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CustomerType->exists($id)) {
			throw new NotFoundException(__('Invalid customer type'));
		}
		$options = array('conditions' => array('CustomerType.' . $this->CustomerType->primaryKey => $id));
		$this->set('customerType', $this->CustomerType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CustomerType->create();
			if ($this->CustomerType->save($this->request->data)) {
				$this->Session->setFlash(__('The customer type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
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
		if (!$this->CustomerType->exists($id)) {
			throw new NotFoundException(__('Invalid customer type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CustomerType->save($this->request->data)) {
				$this->Session->setFlash(__('The customer type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('CustomerType.' . $this->CustomerType->primaryKey => $id));
			$this->request->data = $this->CustomerType->find('first', $options);
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
		$this->CustomerType->id = $id;
		if (!$this->CustomerType->exists()) {
			throw new NotFoundException(__('Invalid customer type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CustomerType->delete()) {
			$this->Session->setFlash(__('Customer type deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Customer type was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
