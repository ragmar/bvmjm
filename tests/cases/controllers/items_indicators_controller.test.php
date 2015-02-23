<?php
/* ItemsIndicators Test cases generated on: 2012-09-27 00:06:17 : 1348720577*/
App::import('Controller', 'ItemsIndicators');

class TestItemsIndicatorsController extends ItemsIndicatorsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ItemsIndicatorsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.items_indicator', 'app.item', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.topic', 'app.type', 'app.author', 'app.items_author', 'app.value', 'app.subfield', 'app.field', 'app.indicator', 'app.items_value', 'app.pagetext');

	function startTest() {
		$this->ItemsIndicators =& new TestItemsIndicatorsController();
		$this->ItemsIndicators->constructClasses();
	}

	function endTest() {
		unset($this->ItemsIndicators);
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
