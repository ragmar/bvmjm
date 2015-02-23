<?php
/* Field Fixture generated on: 2012-09-26 23:31:52 : 1348718512 */
class FieldFixture extends CakeTestFixture {
	var $name = 'Field';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'repeatable' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'mandatory' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'code' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 3, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'book' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'magazine' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'score' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'repeatable' => 1,
			'mandatory' => 1,
			'code' => 'L',
			'book' => 1,
			'magazine' => 1,
			'score' => 1,
			'created' => '2012-09-26 23:31:52',
			'modified' => '2012-09-26 23:31:52'
		),
	);
}
