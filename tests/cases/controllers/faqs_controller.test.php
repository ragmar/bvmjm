<?php
/* Faqs Test cases generated on: 2013-02-04 00:55:19 : 1359955519*/
App::import('Controller', 'Faqs');

class TestFaqsController extends FaqsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class FaqsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.faq', 'app.pagetext');

	function startTest() {
		$this->Faqs =& new TestFaqsController();
		$this->Faqs->constructClasses();
	}

	function endTest() {
		unset($this->Faqs);
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
