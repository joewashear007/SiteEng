<?php
    if($success){
        echo $this->element('article', array("article" => $article ['Article']));
    }else{
        echo "Something went wrong";
    }
?>