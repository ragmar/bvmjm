<?php
/* Indicator Test cases generated on: 2012-09-26 23:35:13 : 1348718713*/
App::import('Model', 'Indicator');

class IndicatorTestCase extends CakeTestCase {
	var $fixtures = array('app.indicator', 'app.field', 'app.subfield', 'app.value', 'app.item', 'app.items_value', 'app.items_indicator');

	function startTest() {
		$this->Indicator =& ClassRegistry::init('Indicator');
	}

	function endTest() {
		unset($this->Indicator);
		ClassRegistry::flush();
	}

}
