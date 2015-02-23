<?php
/* Subfield Test cases generated on: 2012-09-26 23:27:24 : 1348718244*/
App::import('Model', 'Subfield');

class SubfieldTestCase extends CakeTestCase {
	var $fixtures = array('app.subfield', 'app.field', 'app.value', 'app.item', 'app.items_value');

	function startTest() {
		$this->Subfield =& ClassRegistry::init('Subfield');
	}

	function endTest() {
		unset($this->Subfield);
		ClassRegistry::flush();
	}

}
