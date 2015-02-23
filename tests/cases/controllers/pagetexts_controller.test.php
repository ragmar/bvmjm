<?php
/* Pagetexts Test cases generated on: 2012-09-23 14:52:26 : 1348428146*/
App::import('Controller', 'Pagetexts');

class TestPagetextsController extends PagetextsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PagetextsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.pagetext');

	function startTest() {
		$this->Pagetexts =& new TestPagetextsController();
		$this->Pagetexts->constructClasses();
	}

	function endTest() {
		unset($this->Pagetexts);
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
