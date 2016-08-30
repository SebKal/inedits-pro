<?php
App::uses('AppModel', 'Model');

class Role extends AppModel {

    public $displayField    = 'title';

    public $hasMany = array(
        'User' => array(
            'className' => 'User'
        )
    );
}