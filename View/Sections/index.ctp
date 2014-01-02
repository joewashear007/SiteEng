<!-- Start Section : Index -->
<?php
    // $panels = array('Settings' => array('id' => 'Panel-Settings'));
    // $panels['Settings']['Title'] = "Settings";
    // $panels['Settings']['Content'] = $this->element('Panel_Settings');
    echo $this->element('MainMenu');
?>    
<div id="content">
<?php foreach ($sections as $section): ?>
	<section id="section-<?php echo $section['Section']['id']; ?>">
		<header class="page-header" >
            <h2 id="section-<?php echo $section['Section']['id']; ?>-title" class="<?php Configure::read('SiteEng.Run.EditClass'); ?>">
                <?php echo $section['Section']['title']; ?>
            </h2>
            <?php if(Configure::read('SiteEng.Run.Edit')): ?> 
				<button class="btn btn-sm btn-success add" type="button" id="section-<?php echo $section['Section']['id']; ?>-add" >Add Article</button>
			<?php endif; ?>
		</header>
		
		<div class="container" >
			<div class="row" >
			<?php 
			$i = 0; 
			foreach ( $section['Article'] as $article): 
			?>      
			
				<div class="col-md-<?php echo (12 / $section['Section']['columns'] ); ?>">
				
					<!-- The Start of The Article Display --> 
					<?php
						echo $this->element('article', array("article" => $article, "edit" => Configure::read('SiteEng.Run.Edit') ));
					?>
					<!-- The End of The Article Display --> 
					
				</div>
			<?php 
				$i++;
				if ($i % $section['Section']['columns'] == 0): 
			?>
			</div><div class="row">
			<?php endif; ?>
			
			<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>
<?php 
    $this->Js->setVariable = "SiteEng";
    $this->Js->set('panelsAction', $this->Html->url(array("controller" => "section", "action" => "panels")));
    $this->Js->set('articleAction', $this->Html->url(array("controller" => "articles", "action" => "edit")));
    $this->Js->set('sectionAction', $this->Html->url(array("controller" => "sections", "action" => "edit")));
    $this->Js->set('articleAdd',    $this->Html->url(array("controller" => "article", "action" => "add")));
    $this->Js->set('articleDelete', $this->Html->url(array("controller" => "articles", "action" => "delete")));
?>
</div>
<!-- End Section : Index -->

