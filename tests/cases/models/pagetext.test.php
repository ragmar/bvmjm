<?php
/* Pagetext Test cases generated on: 2012-09-23 14:52:25 : 1348428145*/
App::import('Model', 'Pagetext');

class PagetextTestCase extends CakeTestCase {
	var $fixtures = array('app.pagetext');

	function startTest() {
		$this->Pagetext =& ClassRegistry::init('Pagetext');
	}

	function endTest() {
		unset($this->Pagetext);
		ClassRegistry::flush();
	}

}
