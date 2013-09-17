<!-- File: /app/View/Posts/addComment.ctp -->

<h1>Add Comment</h1>
<?php
echo $this->Form->create('Comment');
//echo $this->Form->input('body', array('rows' => '3'));
echo $this->Form->end('Save Comment');
?>