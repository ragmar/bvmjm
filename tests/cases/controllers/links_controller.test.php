<?php
/* Links Test cases generated on: 2013-02-04 00:55:38 : 1359955538*/
App::import('Controller', 'Links');

class TestLinksController extends LinksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LinksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.link', 'app.pagetext');

	function startTest() {
		$this->Links =& new TestLinksController();
		$this->Links->constructClasses();
	}

	function endTest() {
		unset($this->Links);
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
