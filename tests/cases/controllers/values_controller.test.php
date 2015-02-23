<?php
/* Values Test cases generated on: 2012-09-26 23:16:42 : 1348717602*/
App::import('Controller', 'Values');

class TestValuesController extends ValuesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ValuesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.value', 'app.subfield', 'app.item', 'app.items_value', 'app.pagetext');

	function startTest() {
		$this->Values =& new TestValuesController();
		$this->Values->constructClasses();
	}

	function endTest() {
		unset($this->Values);
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
