<?php
/* ItemsIndicator Test cases generated on: 2012-09-27 00:06:17 : 1348720577*/
App::import('Model', 'ItemsIndicator');

class ItemsIndicatorTestCase extends CakeTestCase {
	var $fixtures = array('app.items_indicator', 'app.item', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.topic', 'app.type', 'app.author', 'app.items_author', 'app.value', 'app.subfield', 'app.field', 'app.indicator', 'app.items_value');

	function startTest() {
		$this->ItemsIndicator =& ClassRegistry::init('ItemsIndicator');
	}

	function endTest() {
		unset($this->ItemsIndicator);
		ClassRegistry::flush();
	}

}
