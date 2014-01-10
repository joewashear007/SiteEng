<!-- Start Section : Index -->
<?php
    if ( $this->params['action'] == "index" ):
        echo $this->element('MainMenu');
?>
<div id="content">
<?php endif; ?>

<?php foreach ($sections as $section): ?>
	<section id="section-<?php echo $section['Section']['id']; ?>" >
		<header class="page-header" >
            <h2 id="section-<?php echo $section['Section']['id']; ?>-title" class="<?php Configure::read('SiteEng.Run.EditClass'); ?>">
                <?php echo $section['Section']['title']; ?>
            </h2>
            <?php if(Configure::read('SiteEng.Run.Edit')): ?> 
				<button class="btn btn-sm btn-success add" type="button" id="section-<?php echo $section['Section']['id']; ?>-add" >Add Article</button>
			<?php endif; ?>
		</header>
		
		<div class="container" >
			<?php 
				$i = 0; 
				foreach ( $section['Article'] as $article): 
			?>		
			<?php 
				if ($i % $section['Section']['columns'] == 0){
					if($i != 0){
						echo '</div>';
					}
					echo '<div class="row">';
				}
			?>
				<div class="col-md-<?php echo (12 / $section['Section']['columns'] ); ?>">
				
					<!-- The Start of The Article Display --> 
					<?php
						echo $this->element('article', array("article" => $article, "edit" => Configure::read('SiteEng.Run.Edit') ));
					?>
					<!-- The End of The Article Display --> 
					
				</div>
			<?php $i++;	?>
			<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>
<?php 
    if ( $this->params['action'] == "index" ){
        $this->Js->setVariable = "SiteEng";
        $this->Js->set('EditorClass', Configure::read("SiteEng.Run.EditClass"));
        $this->Js->set('ArticleEdit',   $this->Html->url(array("controller" => "articles", "action" => "edit")));
        $this->Js->set('SectionEdit',   $this->Html->url(array("controller" => "sections", "action" => "edit")));
        $this->Js->set('ArticleAdd',    $this->Html->url(array("controller" => "articles", "action" => "add")));
        $this->Js->set('ArticleDelete', $this->Html->url(array("controller" => "articles", "action" => "delete")));
        $this->Js->set('SectionsFields',$this->Js->object(array("id" =>"section-id", "title" => "section-id-title", "columns" => "section-id-columns")));
        $this->Js->set('ArticleFields', $this->Js->object(array("id" =>"article-id", "title" => "article-id-title", "text" => "article-id-text")));
    }
?>
<?php if ( $this->params['action'] == "index" ): ?>
    </div>
<?php endif; ?>
<!-- End Section : Index -->
