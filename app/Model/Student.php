<?php

class Student extends AppModel {
    public $name = "Student";
    
    public $belongsTo = array(
        'Major'
    );
    
    public $hasOne = array(
        'User' => array(
            'foreignKey' => 'account_id'
        )
    );
    
    public $hasMany = array(
        'Grade',
        'Activity',
        'EnglishTest'
    );   
}
?>
