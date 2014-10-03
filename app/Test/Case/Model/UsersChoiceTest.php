<?php
App::uses('UsersChoice', 'Model');

/**
 * UsersChoice Test Case
 *
 */
class UsersChoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_choice',
		'app.choice',
		'app.question',
		'app.question_type',
		'app.order',
		'app.customer',
		'app.customer_type',
		'app.gift',
		'app.voucher',
		'app.order_type',
		'app.query',
		'app.region',
		'app.banner',
		'app.profile',
		'app.user',
		'app.group',
		'app.action',
		'app.groups_action',
		'app.user_voucher',
		'app.users_gift',
		'app.qday',
		'app.qweek',
		'app.questions_region',
		'app.choice_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersChoice = ClassRegistry::init('UsersChoice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersChoice);

		parent::tearDown();
	}

}
