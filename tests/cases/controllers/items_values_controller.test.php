<?php
/* ItemsValues Test cases generated on: 2012-09-27 00:06:26 : 1348720586*/
App::import('Controller', 'ItemsValues');

class TestItemsValuesController extends ItemsValuesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ItemsValuesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.items_value', 'app.item', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.topic', 'app.type', 'app.author', 'app.items_author', 'app.value', 'app.subfield', 'app.field', 'app.indicator', 'app.items_indicator', 'app.pagetext');

	function startTest() {
		$this->ItemsValues =& new TestItemsValuesController();
		$this->ItemsValues->constructClasses();
	}

	function endTest() {
		unset($this->ItemsValues);
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
