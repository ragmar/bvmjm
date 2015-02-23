<?php
/* Author Test cases generated on: 2012-09-26 22:26:19 : 1348714579*/
App::import('Model', 'Author');

class AuthorTestCase extends CakeTestCase {
	var $fixtures = array('app.author', 'app.item', 'app.items_author');

	function startTest() {
		$this->Author =& ClassRegistry::init('Author');
	}

	function endTest() {
		unset($this->Author);
		ClassRegistry::flush();
	}

}
