<?php

App::uses('AppModel', 'Model');
CakePlugin::load('Uploader');

/**
 * Choice Model
 *
 * @property Question $Question
 * @property ChoiceType $ChoiceType
 * @property User $User
 */
class Choice extends AppModel {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'response';
        public $actsAs = array(
            'Uploader.Attachment' => array(
                'media' => array(
                    'tempDir' => TMP,
                    'transforms' => array(
                        'imageSmall' => array(
                            'class' => 'crop',
                            'self' => true,
                            'width' => 600,
                            'height'=>400
                        ),
                    ),
                    'finalPath' => '/questions/medias/'
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
            'question_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'choice_type_id' => array(
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
            'Question' => array(
                'className' => 'Question',
                'foreignKey' => 'question_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            )
         
        );

        /**
         * hasAndBelongsToMany associations
         *
         * @var array
         */
        public $hasAndBelongsToMany = array(
            'User' => array(
                'className' => 'User',
                'joinTable' => 'users_choices',
                'foreignKey' => 'choice_id',
                'associationForeignKey' => 'user_id',
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
