<?php
App::uses('Choice', 'Model');

/**
 * Choice Test Case
 *
 */
class ChoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		'app.users_choice',
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
		$this->Choice = ClassRegistry::init('Choice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Choice);

		parent::tearDown();
	}

}
