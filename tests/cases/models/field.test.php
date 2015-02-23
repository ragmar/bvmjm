<?php
/* Field Test cases generated on: 2012-09-26 23:31:52 : 1348718512*/
App::import('Model', 'Field');

class FieldTestCase extends CakeTestCase {
	var $fixtures = array('app.field', 'app.indicator', 'app.subfield', 'app.value', 'app.item', 'app.items_value');

	function startTest() {
		$this->Field =& ClassRegistry::init('Field');
	}

	function endTest() {
		unset($this->Field);
		ClassRegistry::flush();
	}

}
