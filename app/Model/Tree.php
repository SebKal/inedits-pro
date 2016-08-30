
<?php
App::uses('AppModel', 'Model');

class Tree extends AppModel {

    public $displayField    = 'title';

    public $hasMany = array(
        'Contribution' => array(
            'className' => 'Contribution',
            'conditions'    => array('Contribution.status' => 3)
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
        }

        return true;
    }

    public function afterSave($created, $options = array()) {

      // Create first contribution after tree creation
      if($this->Contribution->addInitial($this->id)){
        return true;
      }
    }

    public function getTreesByUser($userId = null) {

        if(empty($userId)) return false;

        $trees   = $this->find('all', array(
            'contain'       => array(
                'Tree'          => array(
                    'conditions'    => array('User.id' => $userId)
                )
            )
        ));

        return $trees;
    }

    public function getLastTrees($limit) {

        $trees   = $this->find('all', array(
            'order'             => array('Tree.id DESC'),
            'limit'             => $limit,
            'recursive'         => 0
        ));

        return $trees;
    }

}
