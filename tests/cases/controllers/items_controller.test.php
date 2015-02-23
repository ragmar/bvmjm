<?php
/* Items Test cases generated on: 2012-09-26 23:40:30 : 1348719030*/
App::import('Controller', 'Items');

class TestItemsController extends ItemsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ItemsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.item', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.topic', 'app.type', 'app.author', 'app.items_author', 'app.value', 'app.subfield', 'app.field', 'app.indicator', 'app.items_indicator', 'app.items_value', 'app.pagetext');

	function startTest() {
		$this->Items =& new TestItemsController();
		$this->Items->constructClasses();
	}

	function endTest() {
		unset($this->Items);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
