<?php
App::uses('UserVoucher', 'Model');

/**
 * UserVoucher Test Case
 *
 */
class UserVoucherTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_voucher',
		'app.voucher',
		'app.customer',
		'app.customer_type',
		'app.gift',
		'app.order',
		'app.order_type',
		'app.question',
		'app.question_type',
		'app.choice',
		'app.choice_type',
		'app.user',
		'app.group',
		'app.action',
		'app.groups_action',
		'app.region',
		'app.banner',
		'app.profile',
		'app.qday',
		'app.qweek',
		'app.questions_region',
		'app.users_choice',
		'app.users_gift',
		'app.query'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserVoucher = ClassRegistry::init('UserVoucher');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserVoucher);

		parent::tearDown();
	}

}
