<?php
App::uses('Qweek', 'Model');

/**
 * Qweek Test Case
 *
 */
class QweekTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.qweek',
		'app.region',
		'app.banner',
		'app.profile',
		'app.user',
		'app.group',
		'app.action',
		'app.groups_action',
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
		'app.questions_region',
		'app.choice_type',
		'app.users_choice',
		'app.users_gift',
		'app.user_voucher',
		'app.qday',
		'app.big_gift'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Qweek = ClassRegistry::init('Qweek');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Qweek);

		parent::tearDown();
	}

}
