<div id="SiteEng-Editor">
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
                echo $this->Form->input("SiteEng.Site.EditClass", array('label' => "Editor Class", 'default' => Configure::read("SiteEng.Site.EditClass"), 'class' => 'form-control'));            
                echo "<hr>";
                echo $this->Form->input("SiteEng.Business.Schema", array('label' => "Schema.org Scheme", 'default' => Configure::read("SiteEng.Site.Schema"), 'class' => 'form-control'));            
                echo $this->Form->input("SiteEng.Business.Name", array('label' => "Business Name", 'default' => Configure::read("SiteEng.Site.Name"), 'class' => 'form-control'));            
                echo $this->Form->input("SiteEng.Business.Phone", array('label' => "Business Phone Number", 'default' => Configure::read("SiteEng.Site.Phone"), 'class' => 'form-control'));            
                echo $this->Form->input("SiteEng.Business.Email", array('label' => "Business Email", 'default' => Configure::read("SiteEng.Site.Email"), 'class' => 'form-control'));            
                echo $this->Form->input("SiteEng.Business.Address", array('label' => "Business Street Address", 'default' => Configure::read("SiteEng.Site.Address"), 'class' => 'form-control'));            
                echo $this->Form->input("SiteEng.Business.City", array('label' => "Business City", 'default' => Configure::read("SiteEng.Site.City"), 'class' => 'form-control'));            
                echo $this->Form->input("SiteEng.Business.State", array('label' => "Business State", 'default' => Configure::read("SiteEng.Site.State"), 'class' => 'form-control'));            
                echo $this->Form->input("SiteEng.Business.Zip", array('label' => "Business Zip", 'default' => Configure::read("SiteEng.Site.Zip"), 'class' => 'form-control'));            
                echo $this->Form->end(array("lable" => "Save", "class" => "btn btn-lg btn-success"));
            ?>
        </div>
    </div>
    <!-- The Site Info -->
    <div class="row">
    </div>
</div>
</div>