<?php
App::uses('Region', 'Model');

/**
 * Region Test Case
 *
 */
class RegionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.region',
		'app.banner',
		'app.profile',
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
		$this->Region = ClassRegistry::init('Region');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Region);

		parent::tearDown();
	}

}
