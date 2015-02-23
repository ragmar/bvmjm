<?php
/* Subfields Test cases generated on: 2012-09-26 23:27:24 : 1348718244*/
App::import('Controller', 'Subfields');

class TestSubfieldsController extends SubfieldsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SubfieldsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.subfield', 'app.field', 'app.value', 'app.item', 'app.items_value', 'app.pagetext');

	function startTest() {
		$this->Subfields =& new TestSubfieldsController();
		$this->Subfields->constructClasses();
	}

	function endTest() {
		unset($this->Subfields);
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
