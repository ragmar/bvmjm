<?php
/* Search Test cases generated on: 2013-06-25 10:02:03 : 1372170723*/
App::import('Model', 'Search');

class SearchTestCase extends CakeTestCase {
	var $fixtures = array('app.search', 'app.user', 'app.group', 'app.profile', 'app.country');

	function startTest() {
		$this->Search =& ClassRegistry::init('Search');
	}

	function endTest() {
		unset($this->Search);
		ClassRegistry::flush();
	}

}
