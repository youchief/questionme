<?php
App::uses('AppController', 'Controller');
/**
 * Choices Controller
 *
 * @property Choice $Choice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ChoicesController extends AppController {

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
		$this->Choice->recursive = 0;
		$this->set('choices', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Choice->exists($id)) {
			throw new NotFoundException(__('Invalid choice'));
		}
		$options = array('conditions' => array('Choice.' . $this->Choice->primaryKey => $id));
		$this->set('choice', $this->Choice->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Choice->create();
			if ($this->Choice->save($this->request->data)) {
				$this->Session->setFlash(__('The choice has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choice could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		}
		$questions = $this->Choice->Question->find('list');
		$choiceTypes = $this->Choice->ChoiceType->find('list');
		$users = $this->Choice->User->find('list');
		$this->set(compact('questions', 'choiceTypes', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Choice->exists($id)) {
			throw new NotFoundException(__('Invalid choice'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Choice->save($this->request->data)) {
				$this->Session->setFlash(__('The choice has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choice could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Choice.' . $this->Choice->primaryKey => $id));
			$this->request->data = $this->Choice->find('first', $options);
		}
		$questions = $this->Choice->Question->find('list');
		$choiceTypes = $this->Choice->ChoiceType->find('list');
		$users = $this->Choice->User->find('list');
		$this->set(compact('questions', 'choiceTypes', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Choice->id = $id;
		if (!$this->Choice->exists()) {
			throw new NotFoundException(__('Invalid choice'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Choice->delete()) {
			$this->Session->setFlash(__('Choice deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Choice was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
