<?php
/* Searches Test cases generated on: 2013-06-25 10:02:03 : 1372170723*/
App::import('Controller', 'Searches');

class TestSearchesController extends SearchesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SearchesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.search', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.pagetext', 'app.login');

	function startTest() {
		$this->Searches =& new TestSearchesController();
		$this->Searches->constructClasses();
	}

	function endTest() {
		unset($this->Searches);
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
