<?php
/**
 * QuestionFixture
 *
 */
class QuestionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'question' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'date' => array('type' => 'date', 'null' => true, 'default' => null),
		'media' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'media_type' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'dependance_choice_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'priority' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'active' => array('type' => 'boolean', 'null' => true, 'default' => '1'),
		'question_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_questions_question_types1_idx' => array('column' => 'question_type_id', 'unique' => 0),
			'fk_questions_orders1_idx' => array('column' => 'order_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'question' => 'Lorem ipsum dolor sit amet',
			'date' => '2014-09-30',
			'media' => 'Lorem ipsum dolor sit amet',
			'media_type' => 'Lorem ipsum dolor sit amet',
			'dependance_choice_id' => 1,
			'priority' => 1,
			'active' => 1,
			'question_type_id' => 1,
			'order_id' => 1
		),
	);

}
