<article id="article-<?php echo $article['id']; ?>" class="panel panel-default">
    <header class="panel-heading">
        <div class="panel-title <?php echo Configure::read("SiteEng.Run.EditClass"); ?>" id="article-<?php echo $article['id']; ?>-title" >
            <?php echo $article['title']; ?>
        </div>
		<?php if(Configure::read("SiteEng.Run.Edit")): ?> 
			<button class="btn btn-sm btn-danger delete" type="button" id="article-<?php echo $article['id']; ?>-delete" >Delete</button>
		<?php endif; ?>
    </header>
    <div class="panel-body <?php echo Configure::read("SiteEng.Run.EditClass"); ?>" id="article-<?php echo $article['id']; ?>-text">
        <?php echo $article['text']; ?>
    </div>
</article>
