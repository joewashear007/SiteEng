<?php 
    //Only print this out if in editmode
    if( Configure::read("SiteEng.Run.Edit") ){
        echo $this->Form->create('Settings', array('action' => 'editSetting'));
        foreach( Configure::read("SiteEng.Site") as $key=>$value){
            echo $this->Form->input($key, array('label' => $key, 'default' => $value));
        }
        echo $this->Form->end();
    }
?>
