<!-- File: /app/View/Posts/index.ctp -->

<?php 
//$this->Js->get('#element');
//$result = $this->Js->effect('fadeIn');
$this->Js->get('.title')->event('click', $this->Js->get('.details')->effect('fadeIn'), array('stop' => false)); 
?>

<h1>Blog posts</h1>
<p><?php echo $this->Html->link('Add Post', array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

<!-- Here's where we loop through our $posts array, printing out post info -->

    <?php foreach ($posts as $post): ?>
    <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <div class="title editable">
            <h3 >
            <?php //echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id'])); ?>
            <?php echo $post['Post']['title']; ?>
            
            </h3>
            </div>
        </td>
        <td>
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
            ?>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $post['Post']['id'])); ?>
        </td>
        <td> 
            <?php echo $post['Post']['created']; ?>
        </td>
    </tr>
    <tr>
        <td colspan=4 class=details ><div class="editable"> <?php echo $post['Post']['body']; ?><div></td>
    </tr>
    <?php endforeach; ?>

</table>