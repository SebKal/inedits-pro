<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

class User extends AppModel {

  /*
  *
  *
  *   Model Associations
  *
  *
  */

  public $hasMany = array(
    'Contribution'  => array(
      'className'     => 'Contribution',
    )
  );

  public $belongsTo = array(
    'Role' => array(
      'className' => 'Role',
      'foreignKey' => 'role_id',
      'conditions' => '',
      'fields' => '',
      'order' => '',
    ),
    'Entreprise' => array(
      'className' => 'Entreprise',
      'foreignKey' => 'entreprise_id',
      'conditions' => '',
      'fields' => '',
      'order' => '',
    ),
  );

  public $hasAndBelongsToMany = array(
    'Tree' =>
      array(
        'className'             => 'Tree',
        'joinTable'             => 'contributions',
        'foreignKey'            => 'user_id',
        'associationForeignKey' => 'tree_id',
        'unique'                => true,
      )
  );

  /*
  *
  *
  *   Fields Validation
  *
  *
  */

  public $displayField = 'username';

  public $validate = array(
    'password'  => array(
      'required'  => array(
        'rule'        => array('notBlank'),
        'message'     => 'Un mot de passe est requis',
      )
    ),
    'mail'      => array(
      'required'  => array(
        'rule'        => array('notBlank'),
        'message'     => 'Adresse email requise',
      ),
      'email'     => array(
        'rule'        => 'email',
        'message'     => 'Adresse email incorrect',
      ),
      'unique'    => array(
        'rule'        => 'isUnique',
        'message'     => 'Email Déja utilisé',
      )
    ),
    'name'      => array(
      'required'  => array(
        'rule'        => array('notBlank'),
        'message'     => 'Nom requis',
      )
    )
  );

  /*
  *
  *
  *   Model Methods
  *
  *
  */

  public function beforeSave($options = array()) {

    // Hash Password
    if (isset($this->data[$this->alias]['password'])) {
      $passwordHasher = new SimplePasswordHasher();
      $this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']);
    }

    // Define slug
    if (!empty($this->data[$this->alias]['name']) && !empty($this->data[$this->alias]['last_name']) && empty($this->data[$this->alias]['slug'])) {

      if (!empty($this->data[$this->alias][$this->primaryKey])) {
        $this->data[$this->alias]['slug'] = $this->generateUserSlug($this->data[$this->alias]['name'], $this->data[$this->allias]['last_name'], $this->data[$this->allias][$this->primaryKey]);
      }
      else {
        $this->data[$this->alias]['slug'] = $this->generateUserSlug($this->data[$this->alias]['name'], $this->data[$this->alias]['last_name']);
      }

    }

    return true;
  }

  public function getUserByPop() {

    $test = $this->find('all', array(
      'conditions'  => array('User.Contribution_count > 0')  ,
      'order'       => array('User.contribution_count DESC'),
      'limit'       => 4,

    ));

    return $test;
  }

  public function getLastUsers($limit=3) {

    $users = $this->find('all', array(
      'conditions'  => array('User.status = 3'),
      'order'       => array('User.created DESC'),
      'limit'       => $limit,
      'recursive'   => -1

    ));

    return $users;
  }

  function generatePassword() {

    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < 10; $i++) {
      $index = rand(0, $count - 1);
      $result .= mb_substr($chars, $index, 1);
    }

    return $result;
  }

  public function searchUsers($search) {
    $conditions = [];
    $data       = split(" ", $search);

    foreach ($data as $name) {
      if (!empty($name)){
        $conditions['or'][] = array('User.slug LIKE' => "%$name%");
        $conditions['or'][] = array('User.name LIKE' => "%$name%");
        $conditions['or'][] = array('User.last_name LIKE' => "%$name%");
      }
    }

    return $this->find('all', array(
      'conditions' => $conditions
    ));
  }

}
