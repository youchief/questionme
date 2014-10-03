<?php
App::uses('AppController', 'Controller');
/**
 * OrderTypes Controller
 *
 * @property OrderType $OrderType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OrderTypesController extends AppController {

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
		$this->OrderType->recursive = 0;
		$this->set('orderTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OrderType->exists($id)) {
			throw new NotFoundException(__('Invalid order type'));
		}
		$options = array('conditions' => array('OrderType.' . $this->OrderType->primaryKey => $id));
		$this->set('orderType', $this->OrderType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->OrderType->create();
			if ($this->OrderType->save($this->request->data)) {
				$this->Session->setFlash(__('The order type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
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
		if (!$this->OrderType->exists($id)) {
			throw new NotFoundException(__('Invalid order type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrderType->save($this->request->data)) {
				$this->Session->setFlash(__('The order type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('OrderType.' . $this->OrderType->primaryKey => $id));
			$this->request->data = $this->OrderType->find('first', $options);
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
		$this->OrderType->id = $id;
		if (!$this->OrderType->exists()) {
			throw new NotFoundException(__('Invalid order type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->OrderType->delete()) {
			$this->Session->setFlash(__('Order type deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Order type was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
