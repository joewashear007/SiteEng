<!-- 

var editmode as boolean

-->

<?php 
$sections = $this->requestAction('sections/index/');

$event = $this->Js->get('#msgbox')->effect('fadeOut');
$this->Js->get('#msgbox-close')->event('click', $event);

?>

<div class="navbar navbar-inverse <?php Configure::read('SiteEng.Run.EditClass');  ?>" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Design & Do LLC</a>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <?php foreach ($sections as $section): ?>
                <li><a href="#section<?php echo $section['Section']['id']; ?>"><?php echo $section['Section']['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php if(Configure::read('SiteEng.Run.Edit') ): ?>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo $this->Html->link("Save", array('controller' => 'users', 'action' => 'logout'), array( "class" => "glyphicon glyphicon-floppy-disk")); ?></li>
                <li><?php echo $this->Html->link("Edit Site", array('controller' => 'sections', 'action' => 'editsite'), array( "class" => "glyphicon glyphicon-pencil")); ?></li>
            </ul>
        <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo $this->Html->link("Edit", array('controller' => 'users', 'action' => 'login'), array( "class" => "glyphicon glyphicon-pencil")); ?></li>
            </ul>
        <?php endif; ?>
    </div><!--/.nav-collapse -->
    
</div>

<div id="msgbox" class="navbar navbar-inverse">
	<div id="msgbox-text" ></div>
	<a id="msgbox-close" >X</a>
</div>




