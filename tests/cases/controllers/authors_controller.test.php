<?php
/* Authors Test cases generated on: 2012-09-26 22:26:19 : 1348714579*/
App::import('Controller', 'Authors');

class TestAuthorsController extends AuthorsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class AuthorsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.author', 'app.item', 'app.items_author', 'app.pagetext');

	function startTest() {
		$this->Authors =& new TestAuthorsController();
		$this->Authors->constructClasses();
	}

	function endTest() {
		unset($this->Authors);
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
