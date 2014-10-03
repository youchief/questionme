<?php
App::uses('Question', 'Model');

/**
 * Question Test Case
 *
 */
class QuestionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.question',
		'app.question_type',
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
		$this->Question = ClassRegistry::init('Question');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Question);

		parent::tearDown();
	}

}
