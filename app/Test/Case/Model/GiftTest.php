<?php
App::uses('Gift', 'Model');

/**
 * Gift Test Case
 *
 */
class GiftTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.gift',
		'app.customer',
		'app.customer_type',
		'app.order',
		'app.order_type',
		'app.question',
		'app.question_type',
		'app.choice',
		'app.user',
		'app.group',
		'app.action',
		'app.groups_action',
		'app.region',
		'app.banner',
		'app.banner_type',
		'app.qday',
		'app.qweek',
		'app.big_gift',
		'app.questions_region',
		'app.profile',
		'app.users_choice',
		'app.users_gift',
		'app.voucher',
		'app.user_voucher',
		'app.query'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Gift = ClassRegistry::init('Gift');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Gift);

		parent::tearDown();
	}

}
