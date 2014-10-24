<?php
/**
 * UserVoucherFixture
 *
 */
class UserVoucherFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'used' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'voucher_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_user_vouchers_vouchers1_idx' => array('column' => 'voucher_id', 'unique' => 0),
			'fk_user_vouchers_users1_idx' => array('column' => 'user_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'created' => '2014-10-03 15:00:03',
			'used' => '2014-10-03 15:00:03',
			'voucher_id' => 1,
			'user_id' => 1
		),
	);

}
