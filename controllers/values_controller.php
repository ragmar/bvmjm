<?php
class ValuesController extends AppController {

	var $name = 'Values';

	function beforeFilter(){
		parent::beforeFilter();
	
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->Value->recursive = 0;
		$this->set('values', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid value', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('value', $this->Value->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Value->create();
			if ($this->Value->save($this->data)) {
				$this->Session->setFlash(__('The value has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The value could not be saved. Please, try again.', true));
			}
		}
		$subfields = $this->Value->Subfield->find('list');
		$items = $this->Value->Item->find('list');
		$items = $this->Value->Item->find('list');
		$this->set(compact('subfields', 'items', 'items'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid value', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Value->save($this->data)) {
				$this->Session->setFlash(__('The value has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The value could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Value->read(null, $id);
		}
		$subfields = $this->Value->Subfield->find('list');
		$items = $this->Value->Item->find('list');
		$items = $this->Value->Item->find('list');
		$this->set(compact('subfields', 'items', 'items'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for value', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Value->delete($id)) {
			$this->Session->setFlash(__('Value deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Value was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
