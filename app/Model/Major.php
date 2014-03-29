<?php

class Major extends AppModel {
    public $name = 'Major';
    
    public $hasMany = array(
        'Student'
    );
}
?>
