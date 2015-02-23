<?php
class ItemsIndicatorsController extends AppController {

	var $name = 'ItemsIndicators';

	function beforeFilter(){
		parent::beforeFilter();
	
		if ($this->Session->read('Auth.User.group_id') != '1'){
			$this->Session->setFlash(__('Acceso Restringido.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'home'));
		}
	}
	
	function index() {
		$this->ItemsIndicator->recursive = 0;
		$this->set('itemsIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid items indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('itemsIndicator', $this->ItemsIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ItemsIndicator->create();
			if ($this->ItemsIndicator->save($this->data)) {
				$this->Session->setFlash(__('The items indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items indicator could not be saved. Please, try again.', true));
			}
		}
		$items = $this->ItemsIndicator->Item->find('list');
		$indicators = $this->ItemsIndicator->Indicator->find('list');
		$this->set(compact('items', 'indicators'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid items indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ItemsIndicator->save($this->data)) {
				$this->Session->setFlash(__('The items indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The items indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ItemsIndicator->read(null, $id);
		}
		$items = $this->ItemsIndicator->Item->find('list');
		$indicators = $this->ItemsIndicator->Indicator->find('list');
		$this->set(compact('items', 'indicators'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for items indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ItemsIndicator->delete($id)) {
			$this->Session->setFlash(__('Items indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Items indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
