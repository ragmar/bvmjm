<?php
/* Profile Test cases generated on: 2012-09-23 13:31:41 : 1348423301*/
App::import('Model', 'Profile');

class ProfileTestCase extends CakeTestCase {
	var $fixtures = array('app.profile', 'app.user', 'app.group', 'app.country');

	function startTest() {
		$this->Profile =& ClassRegistry::init('Profile');
	}

	function endTest() {
		unset($this->Profile);
		ClassRegistry::flush();
	}

}
