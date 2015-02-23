<?php
/* Fields Test cases generated on: 2012-09-26 23:31:52 : 1348718512*/
App::import('Controller', 'Fields');

class TestFieldsController extends FieldsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class FieldsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.field', 'app.indicator', 'app.subfield', 'app.value', 'app.item', 'app.items_value', 'app.pagetext');

	function startTest() {
		$this->Fields =& new TestFieldsController();
		$this->Fields->constructClasses();
	}

	function endTest() {
		unset($this->Fields);
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
