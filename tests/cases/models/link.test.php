<?php
/* Link Test cases generated on: 2013-02-04 00:55:37 : 1359955537*/
App::import('Model', 'Link');

class LinkTestCase extends CakeTestCase {
	var $fixtures = array('app.link');

	function startTest() {
		$this->Link =& ClassRegistry::init('Link');
	}

	function endTest() {
		unset($this->Link);
		ClassRegistry::flush();
	}

}
