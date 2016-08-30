<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

App::uses('AppModel', 'Model');

class Genre extends AppModel {

    public $displayField    = 'title';
    
    public $validate = array(
        'title' => array(
            'required' => array(
                'rule'      => array('notBlank'),
                'message'   => 'Nom requis'
            )
        )
    );

    public $hasMany = array(
        'Tree' => array(
            'className' => 'Contribution'
        )
    );
}