<?php
App::uses('QuestionType', 'Model');

/**
 * QuestionType Test Case
 *
 */
class QuestionTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question_type',
		'app.question',
		'app.order',
		'app.choice',
		'app.query',
		'app.region',
		'app.banner',
		'app.profile',
		'app.user',
		'app.group',
		'app.action',
		'app.groups_action',
		'app.user_voucher',
		'app.users_choice',
		'app.gift',
		'app.users_gift',
		'app.qday',
		'app.qweek',
		'app.questions_region'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->QuestionType = ClassRegistry::init('QuestionType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->QuestionType);

		parent::tearDown();
	}

}
