<?php
/* ItemsAuthor Test cases generated on: 2012-09-27 00:06:04 : 1348720564*/
App::import('Model', 'ItemsAuthor');

class ItemsAuthorTestCase extends CakeTestCase {
	var $fixtures = array('app.items_author', 'app.item', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.topic', 'app.type', 'app.author', 'app.value', 'app.subfield', 'app.field', 'app.indicator', 'app.items_indicator', 'app.items_value');

	function startTest() {
		$this->ItemsAuthor =& ClassRegistry::init('ItemsAuthor');
	}

	function endTest() {
		unset($this->ItemsAuthor);
		ClassRegistry::flush();
	}

}
