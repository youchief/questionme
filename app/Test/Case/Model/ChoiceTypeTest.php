<?php
App::uses('ChoiceType', 'Model');

/**
 * ChoiceType Test Case
 *
 */
class ChoiceTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.choice_type',
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
		'app.questions_region'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ChoiceType = ClassRegistry::init('ChoiceType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ChoiceType);

		parent::tearDown();
	}

}
