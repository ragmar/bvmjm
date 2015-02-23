<?php
/* Profiles Test cases generated on: 2012-09-23 13:31:41 : 1348423301*/
App::import('Controller', 'Profiles');

class TestProfilesController extends ProfilesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProfilesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.profile', 'app.user', 'app.group', 'app.country');

	function startTest() {
		$this->Profiles =& new TestProfilesController();
		$this->Profiles->constructClasses();
	}

	function endTest() {
		unset($this->Profiles);
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
