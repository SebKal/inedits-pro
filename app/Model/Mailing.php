<?php
App::uses('AppModel', 'Model');
/**
 * Mailing Model
 *
 */
class Mailing extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'mailing';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'mail';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'mail' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique'    => array(
                'rule'      => 'isUnique',
                'message'   => 'Email Déja sollicité'
            )
		),
	);
}
