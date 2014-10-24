<?php
App::uses('Query', 'Model');

/**
 * Query Test Case
 *
 */
class QueryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.query',
		'app.question',
		'app.question_type',
		'app.order',
		'app.customer',
		'app.customer_type',
		'app.gift',
		'app.voucher',
		'app.order_type',
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
		'app.user_voucher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Query = ClassRegistry::init('Query');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Query);

		parent::tearDown();
	}

}
