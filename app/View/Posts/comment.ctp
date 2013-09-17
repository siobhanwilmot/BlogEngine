<!-- File: /app/View/Posts/comment.ctp -->

<h1>Add Comment</h1>
<?php
echo $this->Form->create('Post');
//echo $this->Form->input('title');
echo $this->Form->input('Comment', array('rows' => '3'));
echo $this->Form->end('Save Comment');
?>