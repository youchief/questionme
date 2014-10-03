<?php
App::uses('AppController', 'Controller');
/**
 * QuestionTypes Controller
 *
 * @property QuestionType $QuestionType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionTypesController extends AppController {

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
		$this->QuestionType->recursive = 0;
		$this->set('questionTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->QuestionType->exists($id)) {
			throw new NotFoundException(__('Invalid question type'));
		}
		$options = array('conditions' => array('QuestionType.' . $this->QuestionType->primaryKey => $id));
		$this->set('questionType', $this->QuestionType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->QuestionType->create();
			if ($this->QuestionType->save($this->request->data)) {
				$this->Session->setFlash(__('The question type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
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
		if (!$this->QuestionType->exists($id)) {
			throw new NotFoundException(__('Invalid question type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->QuestionType->save($this->request->data)) {
				$this->Session->setFlash(__('The question type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('QuestionType.' . $this->QuestionType->primaryKey => $id));
			$this->request->data = $this->QuestionType->find('first', $options);
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
		$this->QuestionType->id = $id;
		if (!$this->QuestionType->exists()) {
			throw new NotFoundException(__('Invalid question type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QuestionType->delete()) {
			$this->Session->setFlash(__('Question type deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question type was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
