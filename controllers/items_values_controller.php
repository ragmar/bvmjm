<?php
class ItemsValuesController extends AppController {

	var $name = 'ItemsValues';

	function beforeFilter(){
		parent::beforeFilter();
	
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->ItemsValue->recursive = 0;
		$this->set('itemsValues', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid items value', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('itemsValue', $this->ItemsValue->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ItemsValue->create();
			if ($this->ItemsValue->save($this->data)) {
				$this->Session->setFlash(__('The items value has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items value could not be saved. Please, try again.', true));
			}
		}
		$items = $this->ItemsValue->Item->find('list');
		$values = $this->ItemsValue->Value->find('list');
		$this->set(compact('items', 'values'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid items value', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ItemsValue->save($this->data)) {
				$this->Session->setFlash(__('The items value has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items value could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ItemsValue->read(null, $id);
		}
		$items = $this->ItemsValue->Item->find('list');
		$values = $this->ItemsValue->Value->find('list');
		$this->set(compact('items', 'values'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for items value', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ItemsValue->delete($id)) {
			$this->Session->setFlash(__('Items value deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Items value was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
