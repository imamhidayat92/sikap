<?php

class AdministratorsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
    }
       
    public function edit() {
        $administrator_id = $this->Auth->user('account_id');
    }
}
?>
