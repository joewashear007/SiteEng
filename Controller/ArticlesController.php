<?php

class ArticlesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Js');
    public $components = array('Session', 'Auth');

    public function edit($id = null) {
        $this->layout = 'ajax';
        Debugger::log("The ID: ".$id);
        if (!$id) {
            $this->set('success', false);
            return; 
        }

        $Article = $this->Article->findById($id);
        
        if (!$Article) {
            Debugger::log("The Article Loaded: NOT ");
            $this->set('success', false);
            return; 
        }
        Debugger::log("Request Type: ".$this->request->method());
        //if ($this->request->is('post') or  $this->request->is('put')) {
        if (!$this->request->is('get')) {
            Debugger::log("Request Type: POST OR PUT");
            $this->Article->id = $id;
            Debugger::log("Article ID: ".$id);
            if ($this->Article->save($this->request->data)) {
                Debugger::log("Save: Success");
                $this->set('success', true);
                return;
            }else{
                Debugger::log("Save: FAIL!");
                $this->set('success', false);
            }            
        }else{
             Debugger::log("Request Type: must be GET");
            $this->set('success', false);
        }
    }
    public function delete($id) {
		if ($this->request->is('get')) {
			$this->set('success', "<strong>FAIL!</strong> The article was not found");
		}

		if ($this->Article->delete($id)) {
			$this->set('success', "<strong>SUCCES!</strong> The article was deleted");
		}
	}
	public function add($sectionId) {
        if ($this->request->is('post')) {
            $this->Article->create();
			$this->Article->set('section-id' , $section-id);
            if ($this->Article->save($this->request->data)) {
                $this->set('success', "<strong>SUCCES!</strong> New Article Created");
            }
            $this->set('success', "<strong>FAIL!</strong> Can't Create Article");
        }
    }
	
	
}

?>