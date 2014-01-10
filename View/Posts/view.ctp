<!-- File: /app/View/Posts/view.ctp -->

<div about="/post" typeof="sioc:Post" class="post" >
<?php 
    //public $helpers = array('Js');
    $this->Js->get('.post')->event('click', 'alert("You Clicked Something");');
?>
<h1 property="title" ><?php echo h($post['Post']['title']); ?></h1>

<p><small>Created: <?php echo $post['Post']['created']; ?></small></p>

<p property="body"><?php echo h($post['Post']['body']); ?></p>
</div>