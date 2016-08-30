<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeSession', 'Model/Datasource');

class Contribution extends AppModel {


  public $displayField  = 'title';
  public $actsAs        = array('Tree');

  public $belongsTo = array(
    'User' => array(
      'className' => 'User',
      'foreignKey' => 'user_id',
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'counterCache' => true,
      'counterScope' => array(
          'Contribution.status' => 3
      ),
    ),
    'Tree' => array(
      'className' => 'Tree',
      'foreignKey' => 'tree_id',
      'conditions' => '',
      'fields' => '',
      'order' => '',
      'counterCache' => true,
      'counterScope' => array(
          'Contribution.status' => 3
      )
    )
  );

  public $validate = array(
      'title'   => array(
        'required' => array(
          'rule'        => array('notBlank'),
          'required'    => true,
          'message'     => 'Titre non valide',
        ),
      ),
      'path_file' => array(
        'maxSize'  => array(
          'allowEmpty'  => true,
          'rule'        => array('fileSize', '<=', '800MB'),
          'message'     => 'Le fichier dépasse la taille maximale',
        ),
      ),
  );

  public function beforeSave($options = array()) {

    // Define slug
    if (!empty($this->data[$this->alias]['title']) && empty($this->data[$this->alias]['slug'])) {
        if (!empty($this->data[$this->alias][$this->primaryKey])) {
          $this->data[$this->alias]['slug'] = $this->generateSlug($this->data[$this->alias]['title'], $this->data['Article'][$this->primaryKey]);
        } else {
          $this->data[$this->alias]['slug'] = $this->generateSlug($this->data[$this->alias]['title']);
        }

        $this->slug = $this->data[$this->alias]['slug'];
    }

    // Define letter count
    if (!empty($this->data[$this->alias]['content']))
    {
      $this->data[$this->alias]['letter_count'] = strlen($this->data[$this->alias]['content']);
    }
    return true;
  }

  public function afterSave($created, $options = [])
  {
    if (isset($this->data[$this->alias]['user_id'])) {
      $user = $this->User->find('first', array(
        'conditions'  => array(
          'User.id' => $this->data[$this->alias]['user_id']
        )
      ));

      // Mail administrateur
      $Email = new CakeEmail('adminNewContrib');
      $Email->viewVars(
        array(
          'participation' => $this->data[$this->alias]['title'],
          'author'        => $user['User']['name'].' '.$user['User']['last_name'],
          'id'            => $this->id,
        )
      )
      ->send();
    }
  }

  public function isOwnedBy($contributionId, $userId) {
      return $this->field('id', array('id' => $contributionId, 'user_id' => $userId)) !== false;
  }

  /*===========================
  ==Queries
  =============================*/

  public function getTreeAuthors($treeId = null) {

      $test   = $this->find('all', array(
        'conditions'  => array('Contribution.tree_id' => $treeId),
        'fields'    => array('User.name', 'User.last_name', 'User.avatar', 'User.id', 'User.slug'),
        'group'     => 'User.id',
          'limit'         => 3
      ));

      return $test;
  }

  public function getUserContrib($userId = null) {

      if(!$userId) return false;

      $contributions   = $this->find('all', array(
          'conditions'        => array(
              'User.id'          => $userId
          ),
          'recursive'         => 2

      ));

      return $contributions;
  }

  public function getLastContrib($userId = null) {

      if(!$userId) return false;

      $find   = $this->find('all', array(
          'conditions'        => array(
              'User.id'          => $userId,
              'Contribution.status' => 3,
          ),
          'order'             => array('Contribution.created DESC'),
          'recursive'         => 2,
          'limit'             => 1

      ));

      return $find;
  }

  public function getTreesByUser($userId = null) {

      if(empty($userId)) return false;

      $test   = $this->find('all', array(
          'conditions'        => array(
              'User.id'          => $userId
          ),
          'fields'          => array('Tree.title'),
          'order'             => array('Contribution.created DESC'),
          'group'             => 'Tree.id',
          'recursive'         => 2

      ));

      return $test;
  }

  // Create the first contribution of a tree
  public function addInitial($treeID){

    $tree = $this->Tree->findById($treeID);

    $this->create();

    $this->set(array(
      'title'   => $tree['Tree']['title'],
      'content' => $tree['Tree']['content'],
      'user_id' => CakeSession::read("Auth.User.id")  ,
      'tree_id' => $treeID,
      'status'    => 3,
    ));

    return $this->save();
  }
}
