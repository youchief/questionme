<?php
App::uses('AppController', 'Controller');
/**
 * Qdays Controller
 *
 * @property Qday $Qday
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QdaysController extends AppController {

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
		$this->Qday->recursive = 0;
		$this->set('qdays', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Qday->exists($id)) {
			throw new NotFoundException(__('Invalid qday'));
		}
		$options = array('conditions' => array('Qday.' . $this->Qday->primaryKey => $id));
		$this->set('qday', $this->Qday->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Qday->create();
			if ($this->Qday->save($this->request->data)) {
				$this->Session->setFlash(__('The qday has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qday could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		}
		$regions = $this->Qday->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Qday->exists($id)) {
			throw new NotFoundException(__('Invalid qday'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Qday->save($this->request->data)) {
				$this->Session->setFlash(__('The qday has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qday could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Qday.' . $this->Qday->primaryKey => $id));
			$this->request->data = $this->Qday->find('first', $options);
		}
		$regions = $this->Qday->Region->find('list');
		$this->set(compact('regions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Qday->id = $id;
		if (!$this->Qday->exists()) {
			throw new NotFoundException(__('Invalid qday'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Qday->delete()) {
			$this->Session->setFlash(__('Qday deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Qday was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
