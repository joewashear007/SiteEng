<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Article extends AppModel {
   public $belongsTo = "Section";
}

?>