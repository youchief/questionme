<?php
App::uses('AppController', 'Controller');
/**
 * Qweeks Controller
 *
 * @property Qweek $Qweek
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QweeksController extends AppController {

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
		$this->Qweek->recursive = 0;
		$this->set('qweeks', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Qweek->exists($id)) {
			throw new NotFoundException(__('Invalid qweek'));
		}
		$options = array('conditions' => array('Qweek.' . $this->Qweek->primaryKey => $id));
		$this->set('qweek', $this->Qweek->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Qweek->create();
			if ($this->Qweek->save($this->request->data)) {
				$this->Session->setFlash(__('The qweek has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qweek could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		}
		$regions = $this->Qweek->Region->find('list');
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
		if (!$this->Qweek->exists($id)) {
			throw new NotFoundException(__('Invalid qweek'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Qweek->save($this->request->data)) {
				$this->Session->setFlash(__('The qweek has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qweek could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Qweek.' . $this->Qweek->primaryKey => $id));
			$this->request->data = $this->Qweek->find('first', $options);
		}
		$regions = $this->Qweek->Region->find('list');
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
		$this->Qweek->id = $id;
		if (!$this->Qweek->exists()) {
			throw new NotFoundException(__('Invalid qweek'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Qweek->delete()) {
			$this->Session->setFlash(__('Qweek deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Qweek was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
