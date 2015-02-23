<?php
/* Author Fixture generated on: 2012-09-26 22:26:19 : 1348714579 */
class AuthorFixture extends CakeTestFixture {
	var $name = 'Author';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'lastname' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'picture' => array('type' => 'string', 'null' => false, 'default' => 'https://dl.dropbox.com/u/8866824/libros/autor_nodisponible.jpg', 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'biography' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_spanish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'lastname' => 'Lorem ipsum dolor sit amet',
			'picture' => 'Lorem ipsum dolor sit amet',
			'biography' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'created' => '2012-09-26 22:26:19',
			'modified' => '2012-09-26 22:26:19'
		),
	);
}
