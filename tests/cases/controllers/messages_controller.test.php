<?php
/* Messages Test cases generated on: 2013-02-04 00:08:28 : 1359952708*/
App::import('Controller', 'Messages');

class TestMessagesController extends MessagesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MessagesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.message', 'app.pagetext');

	function startTest() {
		$this->Messages =& new TestMessagesController();
		$this->Messages->constructClasses();
	}

	function endTest() {
		unset($this->Messages);
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
