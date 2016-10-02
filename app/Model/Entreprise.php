<?php
App::uses('AppModel', 'Model');

class Entreprise extends AppModel {

  /*
  *
  *
  *   Model Associations
  *
  *
  */

  public $hasMany = array(
    'User'  => array(
      'className'     => 'User',
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

  // public $validate = array(
  //   'password'  => array(
  //     'required'  => array(
  //       'rule'        => array('notBlank'),
  //       'message'     => 'Un mot de passe est requis',
  //     )
  //   ),
  //   'mail'      => array(
  //     'required'  => array(
  //       'rule'        => array('notBlank'),
  //       'message'     => 'Adresse email requise',
  //     ),
  //     'email'     => array(
  //       'rule'        => 'email',
  //       'message'     => 'Adresse email incorrect',
  //     ),
  //     'unique'    => array(
  //       'rule'        => 'isUnique',
  //       'message'     => 'Email Déja utilisé',
  //     )
  //   ),
  //   'name'      => array(
  //     'required'  => array(
  //       'rule'        => array('notBlank'),
  //       'message'     => 'Nom requis',
  //     )
  //   )
  // );

  /*
  *
  *
  *   Model Methods
  *
  *
  */

  public function beforeSave($options = array()) {
    // Define slug
    if (!empty($this->data[$this->alias]['name']) && empty($this->data[$this->alias]['slug'])) {
        if (!empty($this->data[$this->alias][$this->primaryKey])) {
          $this->data[$this->alias]['slug'] = $this->generateSlug($this->data[$this->alias]['name'], $this->data['Article'][$this->primaryKey]);
        } else {
          $this->data[$this->alias]['slug'] = $this->generateSlug($this->data[$this->alias]['name']);
        }

        $this->slug = $this->data[$this->alias]['slug'];
    }

    return true;
  }

}
