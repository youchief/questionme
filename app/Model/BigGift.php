<?php

App::uses('AppModel', 'Model');
CakePlugin::load('Uploader');

/**
 * BigGift Model
 *
 * @property Qweek $Qweek
 */
class BigGift extends AppModel {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'name';
       
        public $actsAs = array(
            'Uploader.Attachment' => array(
                'media' => array(
                    'tempDir' => TMP,
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'crop',
                            'self' => true,
                            'width' => 600,
                            'height' => 400
                        ),
                    ),
                    'finalPath' => '/img/gifts/'
                )
            ),
            'Uploader.FileValidation' => array(
                'media' => array(
                    'maxWidth' => 4000,
                    'minHeight' => 400,
                    'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                    'type' => 'image',
                    'mimeType' => array('image/gif', 'image/png', 'image/jpeg'),
                    'filesize' => 5242880,
                    'required' => true
                )
            )
        );

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
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
            'qweek_id' => array(
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
            'Qweek' => array(
                'className' => 'Qweek',
                'foreignKey' => 'qweek_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            ),
            'Customer' => array(
                'className' => 'Customer',
                'foreignKey' => 'customer_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            )
        );

}
