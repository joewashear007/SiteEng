<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Section extends AppModel {
    public $hasMany = "Article";
    
    
    
}

?>