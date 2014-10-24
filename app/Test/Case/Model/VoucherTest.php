<?php
App::uses('Voucher', 'Model');

/**
 * Voucher Test Case
 *
 */
class VoucherTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.user_voucher',
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
		$this->Voucher = ClassRegistry::init('Voucher');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Voucher);

		parent::tearDown();
	}

}
