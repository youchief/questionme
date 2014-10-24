<?php

App::uses('AppModel', 'Model');

/**
 * UsersChoice Model
 *
 * @property Choice $Choice
 * @property User $User
 */
class UsersChoice extends AppModel {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'created';

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'choice_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'user_id' => array(
                'numeric' => array(
                    'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
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
        );

        //The Associations below have been created with all possible keys, those that are not needed can be removed

        /**
         * belongsTo associations
         *
         * @var array
         */
        public $belongsTo = array(
            'Choice' => array(
                'className' => 'Choice',
                'foreignKey' => 'choice_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            ),
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'user_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            ),
            'Question' => array(
                'className' => 'Question',
                'foreignKey' => 'question_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            )
        );

}
