<?php
App::uses('BigGift', 'Model');

/**
 * BigGift Test Case
 *
 */
class BigGiftTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.big_gift',
		'app.qweek'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BigGift = ClassRegistry::init('BigGift');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BigGift);

		parent::tearDown();
	}

}
