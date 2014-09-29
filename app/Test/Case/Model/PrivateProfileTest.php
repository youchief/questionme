<?php
App::uses('PrivateProfile', 'Model');

/**
 * PrivateProfile Test Case
 *
 */
class PrivateProfileTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.private_profile',
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
		'app.users_voucher'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PrivateProfile = ClassRegistry::init('PrivateProfile');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PrivateProfile);

		parent::tearDown();
	}

}
