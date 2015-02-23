<?php
/* News Test cases generated on: 2013-09-01 18:48:55 : 1378077535*/
App::import('Model', 'News');

class NewsTestCase extends CakeTestCase {
	var $fixtures = array('app.news');

	function startTest() {
		$this->News =& ClassRegistry::init('News');
	}

	function endTest() {
		unset($this->News);
		ClassRegistry::flush();
	}

}
