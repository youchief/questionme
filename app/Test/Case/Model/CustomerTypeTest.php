<?php
App::uses('CustomerType', 'Model');

/**
 * CustomerType Test Case
 *
 */
class CustomerTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.customer_type',
		'app.customer'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CustomerType = ClassRegistry::init('CustomerType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CustomerType);

		parent::tearDown();
	}

}
