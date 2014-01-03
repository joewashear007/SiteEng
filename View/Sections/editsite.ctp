<?php
    echo $this->element('MainMenu');
?>    
<div id="content">
    <div class="row">
        <div class="page-header">Edit Site Information</div>
    </div>
    <!-- The Contact Information -->
    <div class="row">
        <div class="form-group" >
            <?php
                echo $this->Form->create('Site Settings');
                echo $this->Form->input("SiteEng.Site.Title", array('label' => "Site Title", 'default' => Configure::read("SiteEng.Site.Title"), 'class' => 'form-control'));
                echo $this->Form->input("SiteEng.Site.URL", array('label' => "Site URL", 'default' => Configure::read("SiteEng.Site.URL"), 'class' => 'form-control'));            
                echo $this->Form->end("Save");
            ?>
        </div>
    </div>
    <!-- The Site Info -->
    <div class="row">
    </div>
</div>