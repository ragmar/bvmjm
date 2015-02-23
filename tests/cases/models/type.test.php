<?php
/* Type Test cases generated on: 2012-09-26 23:09:21 : 1348717161*/
App::import('Model', 'Type');

class TypeTestCase extends CakeTestCase {
	var $fixtures = array('app.type', 'app.item');

	function startTest() {
		$this->Type =& ClassRegistry::init('Type');
	}

	function endTest() {
		unset($this->Type);
		ClassRegistry::flush();
	}

}
