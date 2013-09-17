<?php
class Comment extends AppModel {
    public $validate = array(
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}
