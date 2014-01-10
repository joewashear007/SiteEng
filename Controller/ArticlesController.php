<?php

class ArticlesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Js');
    public $components = array('Session', 'Auth');

    public function edit($id = null) {
        $this->layout = 'ajax';
        if (!$id) {
            $this->set('success', false);
            return; 
        }
        $Article = $this->Article->findById($id);
        if (!$Article) {
            $this->set('success', false);
            return; 
        }
        if (!$this->request->is('get')) {
            $this->Article->id = $id;
            if ($this->Article->save($this->request->data)) {
                Debugger::log("Save: Success");
                $this->set('success', true);
                return;
            }         
        }
        $this->set('success', false);
    }
    public function delete($id) {
        $this->layout = "ajax";
		if (!$this->request->is('get')) {
			$this->Article->id = $id;
			Debugger::log("The ID: ".$id);
			if ($this->Article->delete($id)) {
				Debugger::log("Delete");
				$this->set('success', true);
				// return $this->redirect(
					// array('controller' => 'sections', 'action' => 'draw', $secId)
				// );
			}else{
				Debugger::log("Failed to Delete: ");
				$this->set('success', false);
			}
        }
	}
	public function add($sectionId) {
        $this->layout = "ajax";
        Configure::write('SiteEng.Run.Edit', true);
        Configure::write('SiteEng.Run.EditClass', Configure::read('SiteEng.Site.EditClass'));
        Debugger::log("Starting Add");
        if (!$this->request->is('get')) {
            Debugger::log("Creating ARTICLE");
            $this->Article->create();
            $data = array( 'title' => 'My new article', 'section_id' => $sectionId, 'text' => "Write Some Cool Stuff");
            if ($this->Article->save($data)) {
                Debugger::log("Saved Data:".$this->Article->id);
                $this->set('success', true);
                $this->set('article', $this->Article->findById($this->Article->id));
                return;
            }
            Debugger::log("Didn;t Save Data");
        }else{
            Debugger::log("Request not post?");
        }
        $this->set('success', false);
    }
	
	
}

?>