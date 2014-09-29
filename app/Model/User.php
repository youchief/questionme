<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 * @property Group $Group
 * @property Profile $Profile
 * @property Choice $Choice
 * @property Gift $Gift
 * @property Voucher $Voucher
 */
class User extends AppModel {

        /**
         * Display field
         *
         * @var string
         */
        public $displayField = 'username';

        /**
         * Validation rules
         *
         * @var array
         */
        public $validate = array(
            'username' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'password' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                ),
            ),
            'group_id' => array(
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
            'Group' => array(
                'className' => 'Group',
                'foreignKey' => 'group_id',
                'conditions' => '',
                'fields' => '',
                'order' => ''
            )
        );

        /**
         * hasMany associations
         *
         * @var array
         */
        public $hasMany = array(
            'Profile' => array(
                'className' => 'Profile',
                'foreignKey' => 'user_id',
                'dependent' => false,
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
            'Choice' => array(
                'className' => 'Choice',
                'joinTable' => 'users_choices',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'choice_id',
                'unique' => 'keepExisting',
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
            ),
            'Gift' => array(
                'className' => 'Gift',
                'joinTable' => 'users_gifts',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'gift_id',
                'unique' => 'keepExisting',
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
            ),
            'Voucher' => array(
                'className' => 'Voucher',
                'joinTable' => 'users_vouchers',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'voucher_id',
                'unique' => 'keepExisting',
                'conditions' => '',
                'fields' => '',
                'order' => '',
                'limit' => '',
                'offset' => '',
                'finderQuery' => '',
            )
        );

        public function beforeSave($options = array()) {
                if (isset($this->data[$this->alias]['password'])) {
                        $passwordHasher = new BlowfishPasswordHasher();
                        $this->data[$this->alias]['password'] = $passwordHasher->hash(
                                $this->data[$this->alias]['password']
                        );
                }
                return true;
        }

}
