<?php
/* Types Test cases generated on: 2012-09-26 23:14:14 : 1348717454*/
App::import('Controller', 'Types');

class TestTypesController extends TypesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TypesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.type', 'app.item', 'app.pagetext');

	function startTest() {
		$this->Types =& new TestTypesController();
		$this->Types->constructClasses();
	}

	function endTest() {
		unset($this->Types);
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
