<?php
/* Topics Test cases generated on: 2012-09-26 23:06:53 : 1348717013*/
App::import('Controller', 'Topics');

class TestTopicsController extends TopicsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TopicsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.topic', 'app.item', 'app.pagetext');

	function startTest() {
		$this->Topics =& new TestTopicsController();
		$this->Topics->constructClasses();
	}

	function endTest() {
		unset($this->Topics);
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
