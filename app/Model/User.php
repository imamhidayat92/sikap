<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Student $Student
 * @property Notification $Notification
 */
class User extends AppModel {

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Tidak boleh kosong'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Tidak boleh kosong'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('student')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    );
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
        
    );

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Notification' => array(
			'className' => 'Notification',
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
        'Post'
	);

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['created'] = date('Y-m-d H:i:s');
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}
