<?php

class StudentsController extends AppController {
    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->checkIfStudent();
    }
    
    public function add() {
        
    }
    
    public function dashboard() {
        $student_id = $this->Auth->user('account_id');
        
        $this->set('title_for_layout', "Dashboard");
        
        $this->loadModel('Post');
        $this->loadModel('Quote');
        $this->loadModel('Grade');
        
        /* Grade related data */
        $this->set('number_of_grade_data', $this->Grade->find('count',
                array('conditions' => array(
                    'student_id' => $student_id)
                )
            ));
        $this->set('grades', $this->Grade->find('all',
                array('conditions' => array(
                    'student_id' => $student_id)
                )
            ));
        $this->set('student', $this->Student->findByid($student_id));

        /* Notification Related Data */
        $this->loadModel('Notification');
        $notifications = $this->Notification->find('all', array(
            'conditions' => array(
                'user_id' => $this->Auth->user('id'),
                'dismissed' => false
            ),
            'limit' => 3
        ));
        $this->set('notifications', $notifications);
        
        /* Post related data */
        $this->loadModel('Post');
        $updates_paramadina = $this->Post->find('all', array(
            'limit' => 5,
            'conditions' => array(                
                'category_id' => 1,
            )
        ));
        $updates_dpm = $this->Post->find('all', array(
            'limit' => 5,
            'conditions' => array(            
                'category_id' => 2,
            )
        ));
        $this->set('updates_paramadina', $updates_paramadina);
        $this->set('updates_dpm', $updates_dpm);
        
        /* Quote related data */
        $random_int = rand(1, $this->Quote->find('count'));
        $quotes = $this->Quote->find('all');
        
        $quote_text = "";
        $quote_author = "";
        
        $i = 1;
        foreach ($quotes as $quote) {
            if ($i == $random_int) {
                $quote_text = $quote['Quote']['text'];
                $quote_author = $quote['Quote']['author'];
            }
            $i++;
        }
        
        $this->set('quote_text', $quote_text);
        $this->set('quote_author', $quote_author);
        
        $this->loadModel('Activity');
        
        $activities = $this->Activity->find('all', array(
            'conditions' => array(
                'student_id' => $this->Auth->user('account_id'),
                'status' => 1
            )
        ));
        
        $total_point = 0;
        foreach($activities as $activity) {
            $total_point += $activity['ActivityType']['point'];
        }
        
        $this->set('total_activity_point', $total_point);
        $this->set('total_activity_verified', $this->Activity->find('count', array(
            'conditions' => array(
                'student_id' => $this->Auth->user('account_id'),
                'status' => 1
            )
        )));
        $this->set('total_activity_requested', $this->Activity->find('count', array(
            'conditions' => array(
                'student_id' => $this->Auth->user('account_id'),
                'status' => "NOT 1"
            )
        )));
    }
    
    public function edit_profile() {
        $student_id = $this->Auth->user('account_id');
        
        if ($this->request->isPost()) {
            
        }
    }
    
    public function grade() {
        $student_id = $this->Auth->user('account_id');
        $this->set('title_for_layout', "Analisis Kualitas Akademik");
        
        $this->loadModel('Grade');
        
        $data = $this->Grade->find('all', array(
            'conditions' => array(
                'student_id' => $student_id,
            ),            
        ));
        $this->set('number_of_grade_data', $this->Grade->find('count',
                array('conditions' => array(
                    'student_id' => $student_id)
                )
            ));
        
        $sum_sks = 0.0;        
        $sum_total_acc_ip = 0.0;
        
        foreach ($data as $datum) {
            $sum_sks += $datum['Grade']['point'];
            $sum_total_acc_ip += $datum['Grade']['grade']*$datum['Grade']['point'];
        }
        
        $this->set('current_semester', $this->Grade->find('count', array(
            'conditions' => array(
                'student_id' => $student_id
            )
        )));
        
        $this->set('total_sks', $sum_sks);
        $this->set('total_acc', $sum_total_acc_ip);
        
        $this->set('start_date', $data[0]['Student']['join_date']);
        
        $this->set('student', $data[0]['Student']);
        $this->set('data', $data);
        
        /* PEPT */
        $this->loadModel('EnglishTest');
        $english_tests = $this->EnglishTest->find('all', array(
            'conditions' => array(
                'student_id' => $this->Auth->user('account_id')
            )
        ));
        $this->set('english_tests', $english_tests);
    }
    
    public function index() {
        $this->redirect(array('action' => 'dashboard'));
    }
    
    public function notifications() {
        /* Notification Related Data */
        $this->loadModel('Notification');
        
        $this->Notification->updateAll(
                array(
                    'Notification.dismissed' => true
                )
        );
        
        $notifications = $this->Notification->find('all', array(
            'conditions' => array(
                'user_id' => $this->Auth->user('id'),
            ),
            'limit' => 10
        ));
        $this->set('notifications', $notifications);
    }
}

?>
