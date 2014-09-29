<?php
App::uses('Profile', 'Model');

/**
 * Profile Test Case
 *
 */
class ProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.profile',
		'app.user',
		'app.group',
		'app.action',
		'app.groups_action',
		'app.choice',
		'app.users_choice',
		'app.gift',
		'app.users_gift',
		'app.voucher',
		'app.users_voucher',
		'app.region',
		'app.banner',
		'app.qday',
		'app.qweek',
		'app.question',
		'app.questions_region'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Profile = ClassRegistry::init('Profile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Profile);

		parent::tearDown();
	}

}
