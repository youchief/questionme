<?php
App::uses('AppModel', 'Model');
CakePlugin::load('Uploader');
/**
 * Voucher Model
 *
 * @property Customer $Customer
 */
class Voucher extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        public $order = 'Voucher.id ASC';
        
        public $actsAs = array(
            'Uploader.Attachment' => array(
                'image' => array(
                    'tempDir' => TMP,
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'crop',
                            'self' => true,
                            'width' => 670,
                            'height'=>500
                        ),
                    ),
                    'finalPath' => '/img/vouchers/'
                )
            ),
            'Uploader.FileValidation' => array(
                'image' => array(
                    'maxWidth' => 4000,
                    //'minHeight' => 500,
                    'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                    'type' => 'image',
                    'mimeType' => array('image/gif', 'image/png', 'image/jpeg'),
                    'filesize' => 5242880,
                    'required' => false
                )
            )
        );

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'customer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
