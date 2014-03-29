<?php

class UsersController extends AppController {
    public $paginate = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register');
    }

    public function index() {
        /* Classify user */
        /*
         * 1 => DPM
         * 2 => Akademik
         * 3 => Students
         */
        
        // $this->debug_array(array($this->Auth->user()));
        
        switch($this->Auth->user('account_type')) {
            case 3:
                $this->loadModel('Student');
                $student = $this->Student->findByid($this->Auth->user('account_id'));
                
                $this->Session->write('Student.name', $student['Student']['name']);
                $this->Session->write('Student.nickname', $student['Student']['nickname']);
                $this->Session->write('Student.email', $student['Student']['email']);
                
                $this->redirect(array('controller' => 'students', 'action' => 'dashboard'));
                
                break;
            case 1:
                $this->Session->write('DPM.id', $this->Auth->user('id'));
                $this->redirect(array('controller' => 'activities', 'action' => 'dashboard'));
                break;
            case 2:
                break;            
        }
        
        $this->paginate = array(
            'limit' => 20,
            'order' => array(
                'User.username' => 'ASC'
            )
        );
        
        $users = $this->paginate('User');
        $this->set('users', $users);
    }
    
    public function login() {
        if ($this->Auth->user()) {
            $this->redirect(array('controller' => 'activities', 'action' => 'dashboard'));
        }
        
        if ($this->request->is('post')) {
            $user = $this->User->findByusername($this->request->data['User']['username']);
            
            if ($this->Auth->login()) {
                if ($user['User']['is_active']) {
                    $this->redirect($this->Auth->redirect());
                } else {
                    $this->Session->setFlash('Maaf, login tidak dapat dilakukan. Account Anda belum diverifikasi.', 'default', array('class' => 'alert-box alert'));
                    $this->redirect($this->Auth->logout());
                }                
            } else {
                $this->Session->setFlash('Username atau Password Anda salah.', 'default', array('class' => 'alert-box alert'));
            }
        }
    }
    
    public function logout() {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
    
    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Registrasi berhasil. Anda akan mendapatkan notifikasi jika <em>account</em> Anda telah diverifikasi.', 'default', array('class' => 'alert-box success'));
                $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->setFlash('Registrasi gagal. Silakan coba beberapa saat lagi.', 'default', array('class' => 'alert-box alert'));
            }
        }
    }
}
?>
