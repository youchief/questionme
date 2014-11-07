<?php

App::uses('AppController', 'Controller');

/**
 * Banners Controller
 *
 * @property Banner $Banner
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BannersController extends AppController {

        /**
         * Components
         *
         * @var array
         */
        public $components = array('Paginator', 'Session');

        public function gethome() {
                Configure::write('debug', 2);
                $now = date('Y-m-d H:i');
                $banners = $this->Banner->find('all', array('conditions' => array('Banner.start <' => $now, 'Banner.end >' => $now)));
                
                return $banners;
        }

        /**
         * admin_index method
         *
         * @return void
         */
        public function admin_index() {
                $this->Banner->recursive = 0;
                $this->set('banners', $this->Paginator->paginate());
        }

        /**
         * admin_view method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_view($id = null) {
                if (!$this->Banner->exists($id)) {
                        throw new NotFoundException(__('Invalid banner'));
                }
                $options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
                $this->set('banner', $this->Banner->find('first', $options));
        }

        /**
         * admin_add method
         *
         * @return void
         */
        public function admin_add() {
                if ($this->request->is('post')) {
                        $this->Banner->create();
                        if ($this->Banner->save($this->request->data)) {
                                $this->Session->setFlash(__('The banner has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The banner could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                }
                $regions = $this->Banner->Region->find('list');
                $bannerTypes = $this->Banner->BannerType->find('list');
                $this->set(compact('regions', 'bannerTypes'));
        }

        /**
         * admin_edit method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_edit($id = null) {
                if (!$this->Banner->exists($id)) {
                        throw new NotFoundException(__('Invalid banner'));
                }
                if ($this->request->is('post') || $this->request->is('put')) {
                        if ($this->Banner->save($this->request->data)) {
                                $this->Session->setFlash(__('The banner has been saved'), 'default', array('class' => 'alert alert-success'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The banner could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
                        }
                } else {
                        $options = array('conditions' => array('Banner.' . $this->Banner->primaryKey => $id));
                        $this->request->data = $this->Banner->find('first', $options);
                }
                $regions = $this->Banner->Region->find('list');
                $bannerTypes = $this->Banner->BannerType->find('list');
                $this->set(compact('regions', 'bannerTypes'));
        }

        /**
         * admin_delete method
         *
         * @throws NotFoundException
         * @param string $id
         * @return void
         */
        public function admin_delete($id = null) {
                $this->Banner->id = $id;
                if (!$this->Banner->exists()) {
                        throw new NotFoundException(__('Invalid banner'));
                }
                $this->request->onlyAllow('post', 'delete');
                if ($this->Banner->delete()) {
                        $this->Session->setFlash(__('Banner deleted'), 'default', array('class' => 'alert alert-success'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(__('Banner was not deleted'), 'default', array('class' => 'alert alert-error'));
                return $this->redirect(array('action' => 'index'));
        }

}
