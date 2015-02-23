<?php
class SubfieldsController extends AppController {

	var $name = 'Subfields';

	function beforeFilter(){
		parent::beforeFilter();
	
		if ($this->Session->read('Auth.User.group_id') == '3'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->Subfield->recursive = 0;
		$this->set('subfields', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid subfield', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('subfield', $this->Subfield->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Subfield->create();
			if ($this->Subfield->save($this->data)) {
				$this->Session->setFlash(__('The subfield has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subfield could not be saved. Please, try again.', true));
			}
		}
		$fields = $this->Subfield->Field->find('list');
		$this->set(compact('fields'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid subfield', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Subfield->save($this->data)) {
				$this->Session->setFlash(__('The subfield has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subfield could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Subfield->read(null, $id);
		}
		$fields = $this->Subfield->Field->find('list');
		$this->set(compact('fields'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for subfield', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Subfield->delete($id)) {
			$this->Session->setFlash(__('Subfield deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Subfield was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
