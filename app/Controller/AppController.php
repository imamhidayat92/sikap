<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'users',
                'action' => 'login'
            ),
            'authError' => 'Anda tidak memiliki hak untuk mengakses halaman tersebut!',
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            'authenticate' => array(
                'Form' => array(
                    'userModel' => 'User'
                )
            )
        )
    );
    
    public function beforeFilter() {
        
    }    
    
    public function debug_array($array) {
        print '<pre>';
        $i = 1;
        foreach ($array as $item) {
            print 'Array ' . $i . '<br/>';
            print '-----------------------------------<br/>';
            print_r($item);
        }
        print '</pre>';
    }
    
    /* Security Handler */
    public function checkIfStudent() {
        if ($this->Auth->user('account_type') != 3) {
            $this->Session->setFlash('Anda tidak memiliki hak untuk mengakses bagian tersebut!', 'default', array('class' => 'alert-box alert'));
            $this->redirect('/');
        }
    }
    
    public function checkIfDpm() {
        if ($this->Auth->user('account_type') != 1) {
            $this->Session->setFlash('Anda tidak memiliki hak untuk mengakses bagian tersebut!', 'default', array('class' => 'alert-box alert'));
            $this->redirect('/');
        }
    }
    
    public function checkIfAkademik() {
        if ($this->Auth->user('account_type') != 2) {
            $this->Session->setFlash('Anda tidak memiliki hak untuk mengakses bagian tersebut!', 'default', array('class' => 'alert-box alert'));
            $this->redirect('/');
        }
    }
    
    public function changeLastAccessTime($activity_id) {
        $this->loadModel('Activity');
        $this->Activity->save(array(
            'id' => $activity_id,
            'last_accessed' => date('Y-m-d H:i:s')
        ));
    }
    
    public function sendNotification($excerpt, $notification, $url, $user_id) {
        $this->loadModel('Notification');
        $this->Notification->create();
        $this->Notification->save(array(
            'excerpt' => $excerpt,
            'notification' => $notification,
            'url' => $url,
            'user_id' => $user_id,
            'dismissed' => 0
        ));
    }
}
