<?php
/* ItemsValue Test cases generated on: 2012-09-27 00:06:25 : 1348720585*/
App::import('Model', 'ItemsValue');

class ItemsValueTestCase extends CakeTestCase {
	var $fixtures = array('app.items_value', 'app.item', 'app.user', 'app.group', 'app.profile', 'app.country', 'app.topic', 'app.type', 'app.author', 'app.items_author', 'app.value', 'app.subfield', 'app.field', 'app.indicator', 'app.items_indicator');

	function startTest() {
		$this->ItemsValue =& ClassRegistry::init('ItemsValue');
	}

	function endTest() {
		unset($this->ItemsValue);
		ClassRegistry::flush();
	}

}
