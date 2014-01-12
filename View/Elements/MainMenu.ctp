<div id="msgbox" class="navbar navbar-inverse">
	<div id="msgbox-text" ></div>
	<a id="msgbox-close" >X</a>
</div>


<?php 
$sections = $this->requestAction('sections/index/');

$event = $this->Js->get('#msgbox')->effect('fadeOut');
$this->Js->get('#msgbox-close')->event('click', $event);
?>

<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo Configure::read('SiteEng.Site.URL');  ?>"><?php echo Configure::read('SiteEng.Site.Title');  ?></a>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <?php foreach ($sections as $section): ?>
                <li><a href="#section<?php echo $section['Section']['id']; ?>"><?php echo $section['Section']['title']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php if(Configure::read('SiteEng.Run.Edit') ): ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-icon"><?php echo $this->Html->link("", array('controller' => 'users', 'action' => 'logout'), array( "class" => "glyphicon glyphicon-floppy-saved")); ?></li>
                <li class="navbar-icon"><?php echo $this->Html->link("", array('controller' => 'sections', 'action' => 'editsite'), array( "class" => "glyphicon glyphicon-cog")); ?></li>
            </ul>
        <?php else: ?>
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-icon"><?php echo $this->Html->link("", array('controller' => 'users', 'action' => 'login'), array( "class" => "glyphicon glyphicon-pencil")); ?></li>
            </ul>
        <?php endif; ?>
    </div><!--/.nav-collapse -->
    
</div>





