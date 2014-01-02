<?php

class SectionsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Js');
    public $components = array('Session', 'Auth');
     
        
    public function index() { 
        $this->layout = 'siteeng';
        $sec = $this->Section->find('all', array('order' => array('order' => 'asc')));
        if(isset($this->params['requested']))
        {
            return $sec;
        }
        $this->set('sections', $sec);
        Configure::write('SiteEng.Run.Edit', $this->Auth->loggedIn());
        if( $this->Auth->loggedIn()){
            Configure::write('SiteEng.Run.EditClass', 'SiteEng.Site.EditClass');
        }else{
            Configure::write('SiteEng.Run.EditClass', '');
        }
        $this->set('editmode', $this->Auth->loggedIn() );
    }
    public function panels(){
        $this->layout = 'ajax';
        $sec = $this->Section->find('all', array('order' => array('order' => 'asc')));
        $this->set('sections', $sec);
    }
	public function edit($id = null) {
        $this->layout = 'ajax';
        
        if (!$id) {
            $this->set('success', "<strong>FAIL!</strong> The section you tried to save was invalid");
            return; 
            //throw new NotFoundException(__('Invalid post'));
        }

        $Section = $this->Section->findById($id);
        if (!$Section) {
            $this->set('success', "<strong>FAIL!</strong> The section you tried to save was invalid");
            return; 
            //throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Section->id = $id;
            if ($this->Section->save($this->request->data)) {
                $this->set('success', "<strong>SUCCES!</strong> All your changes are saved!");
                $this->Session->setFlash(__('Your post has been updated.'));
                return;
                //return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
            $this->set('success', "<strong>FAIL!</strong> Unable to save your section!");
        }
    }
}

?>