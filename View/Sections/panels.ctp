<?php
    $panels = array('Settings' => array('id' => 'Panel-Settings'));
    $panels['Settings']['Title'] = "Settings";
    $panels['Settings']['Content'] = $this->element('Panel_Settings');
    
    echo $this->Js->object($panels); 
?>