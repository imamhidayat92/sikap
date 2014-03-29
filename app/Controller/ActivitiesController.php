<?php

class ActivitiesController extends AppController {

    public $paginate = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
    }
    
    public function add() {
        $this->checkIfStudent();
        
        $student_id = $this->Auth->user('account_id');
        
        if ($this->request->isPost()) {
             // Before save action
             
            $this->request->data['created'] = date('Y-m-d H:i:s');
            
             if ($this->Activity->save($this->request->data)) {
                 $this->Session->setFlash('Permintaan Anda telah dikirimkan. Silakan menunggu notifikasi selanjutnya',
                                 'default', array('class' => 'alert-box alert'));
                 $this->redirect(array('action' => 'index'));
             }
         }
         
         $this->loadModel('ActivityType');
         $activity_types = $this->ActivityType->find('all');
         
         $options = array();
         
         foreach($activity_types as $activity_type) {
             $options[$activity_type['ActivityType']['id']] = 
                            $activity_type['ActivityType']['activity_name'] . "   " .
                            $activity_type['ActivityType']['level_information'] . "   " .
                            $activity_type['ActivityType']['time_information'];
         }
         
         $this->set('activity_types', $options);
     }
     
     public function dashboard() {
         $this->checkIfDpm();
         
         $this->layout = "default";
         
         $this->paginate = array(
             'limit' => 10,
             'order' => array(
                 'Activity.id' => 'ASC'
             ),
             'conditions' => array(
                 'status' => 1
             )
         );
         
         $activities = $this->paginate('Activity');
         $this->set('activities', $activities);
     }
     
     public function delete($activity_id) {
         if ($this->request->isPost()) {
             
         }
     }
     
     public function details($activity_id) {
         $this->layout = "default";
         
         $activity = $this->Activity->findByid($activity_id);
         $this->set('activity', $activity);
     }

     public function follow_ups() {
         $this->checkIfDpm();
         
         $this->layout = "default";
         
         $this->paginate = array(
             'limit' => 10,
             'order' => array(
                 'Activity.id' => 'ASC'
             ),
             'conditions' => array(
                 'status' => 0
             )
         );
         
         $activities = $this->paginate('Activity');
         $this->set('activities', $activities);
     }
     
     public function index() {
         $this->checkIfStudent();
         
         $student_id = $this->Auth->user('account_id');
         
         $this->loadModel('Student');
         
         $this->set('title_for_layout', "Data Keaktifan Mahasiswa");
         $this->set('student', $this->Student->findByid($student_id));
         
         $this->paginate = array(
             'limit' => 10,
             'order' => array(
                 'Activity.id' => 'DESC'
             ),
             'conditions' => array(
                 'student_id' => $this->Auth->user('account_id')
             )
         );
         
         $activities = $this->paginate('Activity');
         $this->set('activities', $activities);
         
         $follow_ups = $this->Activity->find('all', array(
             'conditions' => array(
                 'student_id' => $this->Auth->user('account_id'),
                 'status' => 0
             )
         ));
         $this->set('follow_ups', $follow_ups);
     }
     
     public function requests() {
         $this->checkIfDpm();
         
         $this->layout = "default";
         
         $this->paginate = array(
             'limit' => 10,
             'order' => array(
                 'Activity.id' => 'ASC'
             ),
             'conditions' => array(
                 'status' => -1
             )
         );
         
         $activities = $this->paginate('Activity');
         $this->set('activities', $activities);
     }
     
     /* Approval Related */
     
     public function approve($activity_id) {
         $this->checkIfDpm();
         
         $this->layout = "default";
         
         $activity = $this->Activity->findByid($activity_id);
         
         if ($this->request->is('post')){
             $this->request->data['Activity']['status'] = 0;
             
             if ($this->Activity->save($this->request->data)) {
                 // Send notification
                 $this->loadModel('Notification');
                 $this->loadModel('User');
                 
                 $user = $this->User->findByaccount_id($activity['Student']['id']);
                 
                 $this->changeLastAccessTime($activity_id);
                 
                 $this->Notification->create();
                 $this->Notification->save(array(
                     'excerpt' => 'Aktifitas kamu telah di-<em>review</em> oleh DPM.',
                     'notification' => 'Aktifitas kamu (' . $activity['Activity']['name'] . ') telah di-<em>review</em> oleh Direktorat Pengembangan Mahasiswa. Silakan melakukan <em>follow up</em> sesuai jadwal.',
                     'dismissed' => false,
                     'url' => Router::url(array(
                         'controller' => 'activities',
                         'action' => 'details',
                         $activity_id
                     ), true),
                     'user_id' => $user['User']['id']
                 ));
                 
                 $this->Session->setFlash('Persetujuan telah dilakukan', 'default', array('class' => 'alert-box success'));
                 $this->redirect(array('controller'=>'activities', 'action' => 'requests'));
             }
             else {
                 $this->Session->setFlash('Gagal melakukan persetujuan', 'default', array('class' => 'alert-box alert'));
             }
         }         
         
         $this->set('activity', $activity);
     }
     
     public function reject($activity_id) {
         $this->checkIfDpm();
         
         $this->layout = "default";
         
         $activity = $this->Activity->findByid($activity_id);
         
         if ($this->request->is('post')){
             $this->request->data['Activity']['status'] = -2;
             
             if ($this->Activity->save($this->request->data)) {
                 // Send notification
                 $this->loadModel('Notification');
                 $this->loadModel('User');
                 
                 $user = $this->User->findByaccount_id($activity['Student']['id']);
                 
                 $this->changeLastAccessTime($activity_id);
                 
                 $this->Notification->create();
                 $this->Notification->save(array(
                     'excerpt' => 'Aktifitas kamu telah di-<em>reject</em> oleh DPM.',
                     'notification' => 'Aktifitas kamu (' . $activity['Activity']['name'] . ') telah di-<em>reject</em> oleh Direktorat Pengembangan Mahasiswa. Coba cek ulang detail kegiatan kamu.',
                     'dismissed' => false,
                     'url' => Router::url(array(
                         'controller' => 'activities',
                         'action' => 'details',
                         $activity_id
                     ), true),
                     'user_id' => $user['User']['id']
                 ));
                 
                 $this->Session->setFlash('Persetujuan telah dilakukan', 'default', array('class' => 'alert-box success'));
                 $this->redirect(array('controller'=>'activities', 'action' => 'requests'));                
             }
         }         
         
         $this->set('activity', $activity);
     }
     
     public function verify($activity_id) {
         $this->checkIfDpm();
         
         $this->layout = "default";
         
         $activity = $this->Activity->findByid($activity_id);
         
         if ($this->request->is('post')){
             $this->request->data['Activity']['status'] = 1;
             
             if ($this->Activity->save($this->request->data)) {
                 // Send notification
                 $this->loadModel('Notification');
                 $this->loadModel('User');
                 
                 $user = $this->User->findByaccount_id($activity['Student']['id']);
                 
                 $this->changeLastAccessTime($activity_id);
                 
                 $this->Notification->create();
                 $this->Notification->save(array(
                     'excerpt' => 'Aktifitas kamu telah di-<em>verify</em> oleh DPM.',
                     'notification' => 'Aktifitas kamu (' . $activity['Activity']['name'] . ') telah di-<em>verify</em> oleh Direktorat Pengembangan Mahasiswa. Terima kasih telah meng-<em>update</em> aktifitas kamu lewat SIKAP.',
                     'dismissed' => false,
                     'url' => Router::url(array(
                         'controller' => 'activities',
                         'action' => 'details',
                         $activity_id
                     ), true),
                     'user_id' => $user['User']['id']
                 ));
                 
                 $this->Session->setFlash('Persetujuan telah dilakukan', 'default', array('class' => 'alert-box success'));
                 $this->redirect(array('controller'=>'activities', 'action' => 'follow_ups'));                
             }
         }         
         
         $this->set('activity', $activity);
     }
}
?>
