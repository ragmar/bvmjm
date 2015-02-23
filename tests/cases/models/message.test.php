<?php
/* Message Test cases generated on: 2013-02-04 00:08:28 : 1359952708*/
App::import('Model', 'Message');

class MessageTestCase extends CakeTestCase {
	var $fixtures = array('app.message');

	function startTest() {
		$this->Message =& ClassRegistry::init('Message');
	}

	function endTest() {
		unset($this->Message);
		ClassRegistry::flush();
	}

}
