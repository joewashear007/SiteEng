<?php

class ArticlesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session', 'Js');
    public $components = array('Session', 'Auth');

    public function edit($id = null) {
        $this->layout = 'ajax';
        
        if (!$id) {
            $this->set('success', "<strong>FAIL!</strong> The article you tried to save was invalid");
            return; 
            //throw new NotFoundException(__('Invalid post'));
        }

        $Article = $this->Article->findById($id);
        if (!$Article) {
            $this->set('success', "<strong>FAIL!</strong> The article you tried to save was invalid");
            return; 
            //throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Article->id = $id;
            if ($this->Article->save($this->request->data)) {
                $this->set('success', "<strong>SUCCES!</strong> All your changes are saved!");
                $this->Session->setFlash(__('Your post has been updated.'));
                return;
                //return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to update your post.'));
            $this->set('success', "<strong>FAIL!</strong> Unable to save your article!");
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
	public function add($section-id) {
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