<?php
/* ItemsAuthors Test cases generated on: 2012-09-27 00:06:05 : 1348720565*/
App::import('Controller', 'ItemsAuthors');

class TestItemsAuthorsController extends ItemsAuthorsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ItemsAuthorsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.items_author', 'app.item', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.topic', 'app.type', 'app.author', 'app.value', 'app.subfield', 'app.field', 'app.indicator', 'app.items_indicator', 'app.items_value', 'app.pagetext');

	function startTest() {
		$this->ItemsAuthors =& new TestItemsAuthorsController();
		$this->ItemsAuthors->constructClasses();
	}

	function endTest() {
		unset($this->ItemsAuthors);
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
