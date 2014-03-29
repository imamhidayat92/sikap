<?php
class PostsController extends AppController {
    public $paginate = array();
    
    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->checkIfDpm();
    }
    
    public function add() {
        if ($this->request->isPost()) {
            /* Handle file upload */
            $upload_dir = APP . "webroot\\img\\media\\";
            $uploaded_filename = md5_file($this->request->data['Post']['thumbnail']['tmp_name']) . "_" . basename($this->request->data['Post']['thumbnail']['name']);
            
            if (move_uploaded_file($this->request->data['Post']['thumbnail']['tmp_name'], $upload_dir . $uploaded_filename)) {
                $this->request->data['Post']['thumbnail_url'] = $uploaded_filename;
                $this->request->data['Post']['created'] = date("Y-m-d H:i:s");
                
                if ($this->Post->save($this->request->data)) {
                    $this->Session->setFlash('Post telah tersimpan.', 'default', array('class' => 'alert-box success'));
                    $this->redirect(array('action' => 'index'));
                }
            }
            else {
                $this->Session->setFlash('Gagal meng-upload file. Silakan coba lagi.', 'default', array('class' => 'alert-box alert'));
            }           
        }
        
        $this->loadModel('Category');
        $categories = $this->Category->find('all');
        
        $posts = $this->paginate('all', array(
            'order' => array(
                'Post.created' => 'DESC'
            )
        ));
        
        $options = array();
        
        foreach($categories as $category) {
            $options[$category['Category']['id']] = $category['Category']['name'];
        }
        
        $this->set('categories', $options);
        $this->set('posts', $posts);
    }
    
    public function edit($id) {
        $post = $this->Post->findByid($id);
        $this->set('post', $post);
        
        if ($this->request->isPost()) {
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash('Perubahan pada post telah tersimpan.', 'default', array('class' => 'alert-box success'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    
    public function index() {
        $this->paginate = array(
            'limit' => 10,
            'order' => array(
                'Post.created' => 'DESC'
            )
        );
        
        $posts = $this->paginate('Post');
        $this->set('posts', $posts);
    }
}
?>
