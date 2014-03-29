<?php
App::uses('AppModel', 'Model');
/**
 * Activity Model
 *
 * @property Student $Student
 */
class Activity extends AppModel {

    public $name = 'Activity';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'activity_name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
        'ActivityType' => array(
            'foreignKey' => 'type'
        )
    );
}
