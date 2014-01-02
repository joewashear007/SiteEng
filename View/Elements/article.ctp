<?php 
    if($article['type'] == "article"):
?>
<article id="article-<?php echo $article['id']; ?>" class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title <?php if($edit) { echo "editable"; } ?> " id="article-<?php echo $article['id']; ?>-title" >
            <?php echo $article['title']; ?>
        </h3>
		<?php if($edit): ?> 
			<button class="btn btn-sm btn-danger delete" type="button" id="article-<?php echo $article['id']; ?>-delete" >Delete</button>
		<?php endif; ?>
    </header>
    <div class="panel-body <?php if($edit) { echo "editable"; } ?> " id="article-<?php echo $article['id']; ?>-text">
        <?php echo $article['text']; ?>
    </div>
</article>
<?php 
    else:
?>
<article id="article-<?php echo $article['id']; ?>" class="">
    <header class="panel-heading">
        <h3 class="<?php if($edit) { echo "editable"; } ?> " id="article-<?php echo $article['id']; ?>-title" >
            <?php echo $article['title']; ?>
        </h3>
    </header>
    <div class=" <?php if($edit) { echo "editable"; } ?> " id="article-<?php echo $article['id']; ?>-text">
        <?php echo $article['text']; ?>
    </div>
</article>
<?php 
    endif;
?>



    