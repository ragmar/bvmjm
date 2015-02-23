<?php
/* ItemsValue Fixture generated on: 2012-09-27 00:06:25 : 1348720585 */
class ItemsValueFixture extends CakeTestFixture {
	var $name = 'ItemsValue';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'value_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'item_id' => 1,
			'value_id' => 1,
			'created' => '2012-09-27 00:06:25',
			'modified' => '2012-09-27 00:06:25'
		),
	);
}
