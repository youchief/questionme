<?php
App::uses('Qday', 'Model');

/**
 * Qday Test Case
 *
 */
class QdayTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.qday',
		'app.region',
		'app.banner',
		'app.profile',
		'app.user',
		'app.group',
		'app.action',
		'app.groups_action',
		'app.user_voucher',
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
		'app.qweek'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Qday = ClassRegistry::init('Qday');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Qday);

		parent::tearDown();
	}

}
