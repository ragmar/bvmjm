<?php
/* Indicators Test cases generated on: 2012-09-26 23:35:13 : 1348718713*/
App::import('Controller', 'Indicators');

class TestIndicatorsController extends IndicatorsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class IndicatorsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.indicator', 'app.field', 'app.subfield', 'app.value', 'app.item', 'app.items_value', 'app.items_indicator', 'app.pagetext');

	function startTest() {
		$this->Indicators =& new TestIndicatorsController();
		$this->Indicators->constructClasses();
	}

	function endTest() {
		unset($this->Indicators);
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
