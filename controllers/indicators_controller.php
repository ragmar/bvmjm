<?php
class IndicatorsController extends AppController {

	var $name = 'Indicators';

	function beforeFilter(){
		parent::beforeFilter();
	
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->Indicator->recursive = 0;
		$this->set('indicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('indicator', $this->Indicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Indicator->create();
			if ($this->Indicator->save($this->data)) {
				$this->Session->setFlash(__('The indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The indicator could not be saved. Please, try again.', true));
			}
		}
		$fields = $this->Indicator->Field->find('list');
		$items = $this->Indicator->Item->find('list');
		$this->set(compact('fields', 'items'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Indicator->save($this->data)) {
				$this->Session->setFlash(__('The indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Indicator->read(null, $id);
		}
		$fields = $this->Indicator->Field->find('list');
		$items = $this->Indicator->Item->find('list');
		$this->set(compact('fields', 'items'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Indicator->delete($id)) {
			$this->Session->setFlash(__('Indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
