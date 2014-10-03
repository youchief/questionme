<?php
App::uses('OrderType', 'Model');

/**
 * OrderType Test Case
 *
 */
class OrderTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.order_type',
		'app.order',
		'app.customer',
		'app.customer_type',
		'app.gift',
		'app.voucher',
		'app.question',
		'app.question_type',
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
		$this->OrderType = ClassRegistry::init('OrderType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->OrderType);

		parent::tearDown();
	}

}
