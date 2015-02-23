<?php
/* ItemsIndicator Fixture generated on: 2012-09-27 00:06:16 : 1348720576 */
class ItemsIndicatorFixture extends CakeTestFixture {
	var $name = 'ItemsIndicator';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indicator_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'item_id' => 1,
			'indicator_id' => 1,
			'created' => '2012-09-27 00:06:16',
			'modified' => '2012-09-27 00:06:16'
		),
	);
}
