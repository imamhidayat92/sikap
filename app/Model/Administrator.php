<?php

class Administrator extends AppModel {
    public $name = 'Administrator';
    
    public $hasOne = array(
        'User'
    );
}
?>
