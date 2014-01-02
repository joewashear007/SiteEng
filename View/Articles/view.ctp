
<?php
$this->extend('/Common/view');

$this->assign('title', $post);

$this->start('Article');
?>

<article id="article<?php echo $article['Article']['id']; ?>" >
    <header class="editable" id="article<?php echo $article['Article']['id']; ?>-title" >
        <?php echo $article['Article']['title']; ?>
    </header>
    <div class="editable" id="article<?php echo $article['Article']['id']; ?>-text">
        <?php echo $article['Article']['text']; ?>
    </div>
</article>

<?php $this->end(); ?>
