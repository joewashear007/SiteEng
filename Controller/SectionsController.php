<?php

class SectionsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Js');
    public $components = array('Session', 'Auth');
    
    public function beforeFilter() {
        parent::beforeFilter();
        if(!$this->Auth->loggedIn()) {
            $this->Components->unload('DebugKit.Toolbar');
        }
    }
     
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
            Configure::write('SiteEng.Run.EditClass', Configure::read('SiteEng.Site.EditClass'));
            Configure::write('debug', false);
        }else{
            Configure::write('SiteEng.Run.EditClass', '');
            Configure::write('debug', true);
        }
        $this->set('editmode', $this->Auth->loggedIn() );
    }
    
    public function editsite(){
        $this->layout = 'siteeng';
        if( ! $this->Auth->loggedIn()){
            return $this->redirect(
                array('controller' => 'sections', 'action' => 'index')
            );
        }

        if (!$this->request->is('get')) {
            $this->set('data', $this->request->data);
            Configure::write($this->request->data);
            Configure::dump("SiteEng");
            return $this->redirect(array('action' => 'index'));
        }        
    }
    
	public function edit($id = null) {
        $this->layout = 'ajax';
        if (!$id) {
            $this->set('success', false);
            return; 
        }
        $Section = $this->Section->findById($id);
        if (!$Section) {
            $this->set('success', false);
            return; 
        }
        if (!$this->request->is('get')) {
            $this->Section->id = $id;
            if ($this->Section->save($this->request->data)) {
                $this->set('success', true);
                return;
            }
        }
        $this->set('success', false);
    }
    
    public function draw($id) {
        $this->layout = 'ajax';
        $Section = $this->Section->findById($id);
        if (!$Section) {
            $this->set('success', $Sections);
            return; 
        }
        Configure::write('SiteEng.Run.Edit', true);
        Configure::write('SiteEng.Run.EditClass', Configure::read('SiteEng.Site.EditClass'));
        $this->set('editmode', true );
        $this->set('sections', array($Section));
        $this->render('index');
    }
    
    public function deleteArticle($id) {
        $this->layout = 'ajax';
        Debugger::log("Log Message");
        if ($this->request->is('post')) {
            $articleId = $this->passedArgs['articleId'];
            if($articleId){
                $this->Section->Article->delete($articleId);
                $this->set('success', true);
            
            }else{
                Debugger::log("Skipping Article create");
            }
        }
        $Section = $this->Section->findById($id);
        if (!$Section) {
            $this->set('success', $Sections);
            return; 
        }
        Configure::write('SiteEng.Run.Edit', true);
        Configure::write('SiteEng.Run.EditClass', Configure::read('SiteEng.Site.EditClass'));
        $this->set('editmode', true );
        $this->set('sections', array($Section));
        $this->render('index');
    }
}

?>