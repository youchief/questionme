<?php

App::uses('AppModel', 'Model');
CakePlugin::load('Uploader');

/**
 * Question Model
 *
 * @property QuestionType $QuestionType
 * @property Order $Order
 * @property Choice $Choice
 * @property Query $Query
 * @property Region $Region
 */
class Question extends AppModel {

        public $uses = array('Question', 'UserChoice');

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'question';
        public $actsAs = array(
            'Uploader.Attachment' => array(
                'media' => array(
                    'tempDir' => TMP,
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'resize',
                            'self' => true,
                            
                            'height'=>400
                        ),
                    ),
                    'finalPath' => '/img/choices/'
                )
            ),
            'Uploader.FileValidation' => array(
                'media' => array(
                    'maxWidth' => 4000,
                    'minHeight' => 680,
                    'extension' => array('gif', 'jpg', 'png', 'jpeg'),
                    'type' => 'image',
                    'mimeType' => array('image/gif', 'image/png', 'image/jpeg'),
                    'filesize' => 5242880,
                    'required' => false
                )
            ),
        );

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'question' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'response_type' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'question_type_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'order_id' => array(
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
            'QuestionType' => array(
                'className' => 'QuestionType',
                'foreignKey' => 'question_type_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            ),
            'Order' => array(
                'className' => 'Order',
                'foreignKey' => 'order_id',
                'conditions' => '',
                'fields' => '',
                'order' => 'Order.deadline DESC'
            )
        );

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
            'Choice' => array(
                'className' => 'Choice',
                'foreignKey' => 'question_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => ''
            ),
            'Query' => array(
                'className' => 'Query',
                'foreignKey' => 'question_id',
                'dependent' => true,
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'exclusive' => '',
                'finderQuery' => '',
                'counterQuery' => ''
            )
        );

        /**
         * hasAndBelongsToMany associations
         *
         * @var array
         */
        public $hasAndBelongsToMany = array(
            'Region' => array(
                'className' => 'Region',
                'joinTable' => 'questions_regions',
                'foreignKey' => 'question_id',
                'associationForeignKey' => 'region_id',
                'unique' => 'keepExisting',
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
            )
        );

}
