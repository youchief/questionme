<?php
App::uses('AppController', 'Controller');
/**
 * BannerTypes Controller
 *
 * @property BannerType $BannerType
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BannerTypesController extends AppController {

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
		$this->BannerType->recursive = 0;
		$this->set('bannerTypes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BannerType->exists($id)) {
			throw new NotFoundException(__('Invalid banner type'));
		}
		$options = array('conditions' => array('BannerType.' . $this->BannerType->primaryKey => $id));
		$this->set('bannerType', $this->BannerType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BannerType->create();
			if ($this->BannerType->save($this->request->data)) {
				$this->Session->setFlash(__('The banner type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
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
		if (!$this->BannerType->exists($id)) {
			throw new NotFoundException(__('Invalid banner type'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BannerType->save($this->request->data)) {
				$this->Session->setFlash(__('The banner type has been saved'), 'default', array('class'=>'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The banner type could not be saved. Please, try again.'), 'default', array('class'=>'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('BannerType.' . $this->BannerType->primaryKey => $id));
			$this->request->data = $this->BannerType->find('first', $options);
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
		$this->BannerType->id = $id;
		if (!$this->BannerType->exists()) {
			throw new NotFoundException(__('Invalid banner type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BannerType->delete()) {
			$this->Session->setFlash(__('Banner type deleted'), 'default', array('class'=>'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Banner type was not deleted'), 'default', array('class'=>'alert alert-error'));
		return $this->redirect(array('action' => 'index'));
	}
}
