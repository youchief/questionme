<?php

App::uses('AppModel', 'Model');
CakePlugin::load('Uploader');

/**
 * Banner Model
 *
 * @property Region $Region
 */
class Banner extends AppModel {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'title';
        public $actsAs = array(
            'Uploader.Attachment' => array(
                'background' => array(
                    'tempDir' => TMP,
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'crop',
                            'self' => true,
                            'width' => 1000,
                            'height'=>400
                        ),
                    ),
                    'finalPath' => '/img/banners/'
                )
            ),
            'Uploader.FileValidation' => array(
                'background' => array(
                    'maxWidth' => 4000,
                    'minHeight' => 500,
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
            'start' => array(
                'datetime' => array(
                    'rule' => array('datetime'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'end' => array(
                'datetime' => array(
                    'rule' => array('datetime'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            
            'title' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'subtitle' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'region_id' => array(
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
            'Region' => array(
                'className' => 'Region',
                'foreignKey' => 'region_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            ),
            'BannerType' => array(
                'className' => 'BannerType',
                'foreignKey' => 'banner_type_id',
                'conditions' => '',
                'fields' => '',
                'order' => 'BannerType.order ASC'
            )
        );

}
