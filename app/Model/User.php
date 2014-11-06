<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

/**
 * User Model
 *
 * @property Group $Group
 * @property Region $Region
 * @property Profile $Profile
 * @property UserVoucher $UserVoucher
 * @property Choice $Choice
 * @property Gift $Gift
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
                'alphaNumeric' => array(
                    'rule' => 'alphaNumeric',
                    'required' => 'create',
                    'message' => 'Chiffres et lettres uniquement !'
                ),
                'between' => array(
                    'rule' => array('between', 5, 15),
                    'message' => 'Entre 5 et 15 caractères'
                ),
                'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'Ce pseudo est déjà pris :-('
                )
            ),
            'password' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                ),
                'between' => array(
                    'rule' => array('between', 5, 15),
                    'message' => 'Entre 5 et 15 caractères'
                ),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'gender' => array(
                'notEmpty' => array(
                    'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
                )
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
            'email' => array(
                'Y aurait pas un petit bug avec ton e-mail ?' => array(
                    'rule' => 'email',
                ),
                'Cet e-mail est déjà pris :-(' =>array(
                    'rule' => 'isUnique',
                )
                
            ),
            
            'birthday' => array(
                'rule' => 'date',
                'message' => 'Entrez une date valide',
            )
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
            ),
            'Region' => array(
                'className' => 'Region',
                'foreignKey' => 'region_id',
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
            ),
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
                'joinTable' => 'user_vouchers',
                'foreignKey' => 'user_id',
                'associationForeignKey' => 'voucher_id',
                'unique' => 'keepExisting',
                'conditions' => '',
                'fields' => '',
                'order' => 'UserVoucher.id DESC',
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
