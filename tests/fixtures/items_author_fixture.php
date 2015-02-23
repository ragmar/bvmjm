<?php
/* ItemsAuthor Fixture generated on: 2012-09-27 00:06:04 : 1348720564 */
class ItemsAuthorFixture extends CakeTestFixture {
	var $name = 'ItemsAuthor';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'item_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'author_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'principal' => array('type' => 'boolean', 'null' => false, 'default' => '1'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'item_id' => 1,
			'author_id' => 1,
			'principal' => 1,
			'created' => '2012-09-27 00:06:04',
			'modified' => '2012-09-27 00:06:04'
		),
	);
}
