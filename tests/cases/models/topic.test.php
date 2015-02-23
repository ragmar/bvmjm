<?php
/* Topic Test cases generated on: 2012-09-26 23:06:53 : 1348717013*/
App::import('Model', 'Topic');

class TopicTestCase extends CakeTestCase {
	var $fixtures = array('app.topic', 'app.item');

	function startTest() {
		$this->Topic =& ClassRegistry::init('Topic');
	}

	function endTest() {
		unset($this->Topic);
		ClassRegistry::flush();
	}

}
