<?php
class AppSchema extends CakeSchema {

  public function before($event = array()) {
    // Disable cache
    $db = ConnectionManager::getDataSource($this->connection);
    $db->cacheSources = false;

    return true;
  }

  public function after($event = array()) {
    if (isset($event['create'])) {
      switch ($event['create']) {
        case 'users':
          App::uses('ClassRegistry', 'Utility');
          $post = ClassRegistry::init('User', array(
            'ds' => $this->connection,
          ));
          $post->create();
          $post->saveMany(
              array('User' =>
                  array(
                    'name'        => 'Sébastien',
                    'last_name'   => 'Kalinine',
                    'password'    => 'admin',
                    'mail'        => 'sebastien.kalinine@gmail.com',
                    'avatar'      => null,
                    'cover'       => null,
                    'status'      => 3,
                    'role_id'     => 1,
                  ),
                  array(
                    'name'        => 'Nicolas',
                    'last_name'   => 'Soret',
                    'password'    => 'admin',
                    'mail'        => 'nico.soret@gmail.com',
                    'avatar'      => null,
                    'cover'       => null,
                    'status'      => 3,
                    'role_id'     => 1,
                  ),
                  array(
                    'name'        => 'Florence',
                    'last_name'   => 'Euverte',
                    'password'    => 'admin',
                    'mail'        => 'florence@inedits.fr',
                    'avatar'      => null,
                    'cover'       => null,
                    'status'      => 3,
                    'role_id'     => 1,
                  ),
                  array(
                    'name'        => 'Marie Line',
                    'last_name'   => 'Musset',
                    'password'    => 'admin',
                    'mail'        => 'marie.line@inedits.com',
                    'avatar'      => null,
                    'cover'       => null,
                    'status'      => 3,
                    'role_id'     => 1,
                  ),
                  array(
                    'name'        => 'Jean',
                    'last_name'   => 'Lambda',
                    'password'    => 'member',
                    'mail'        => 'sebastien.kalinine@hotmail.fr',
                    'avatar'      => null,
                    'cover'       => null,
                    'status'      => 3,
                    'role_id'     => 2,
                  )
              )
          );
          break;

        case 'roles':
          App::uses('ClassRegistry', 'Utility');
          $post = ClassRegistry::init('Role', array(
            'ds' => $this->connection,
          ));
          $post->create();
          $post->saveMany(
              array('Role' =>
                array(
                  'title'       => 'Administrateur',
                  'slug'        => 'administrateur',
                  'level'       => '0',
                ),
                array(
                  'title'       => 'Modérateur',
                  'slug'        => 'moderateur',
                  'level'       => '1',
                ),
                array(
                  'title'       => 'Membre',
                  'slug'        => 'membre',
                  'level'       => '2',
                )
              )
          );
          break;
      }
    }

  }

  public $users = array(
    'id' => array(
      'type' => 'integer',
      'null' => false,
      'default' => null,
      'unsigned' => true,
      'key' => 'primary'
    ),
    'slug' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'name' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'last_name' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'password' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'length' => 50,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'mail' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'avatar' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'cover' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'facebook' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'twitter' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'website' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'bio' => array(
      'type' => 'text',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'favorite_author' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'favorite_author_link' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'created' => array(
      'type' => 'datetime',
      'null' => true,
      'default' => null
    ),
    'status' => array(
      'type' => 'integer',
      'null' => false,
      'default' => '1',
      'length' => 4,
      'unsigned' => false
    ),
    'modified' => array(
      'type' => 'datetime',
      'null' => true,
      'default' => null
    ),
    'contribution_count' => array(
      'type' => 'integer',
      'null' => false,
      'default' => '0',
      'unsigned' => false
    ),
    'token' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'role_id' => array(
      'type' => 'integer',
      'null' => false,
      'default' => '2',
      'unsigned' => true
    ),
    'inspiration' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'length' => 45,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'style' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'genre' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'social_writting' => array(
      'type' => 'text',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'favorite_book' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'indexes' => array(
      'PRIMARY' => array(
        'column' => 'id',
        'unique' => 1
      )
    ),
    'tableParameters' => array(
      'charset' => 'latin1',
      'collate' => 'latin1_swedish_ci',
      'engine' => 'InnoDB'
    )
  );

  public $roles = array(
    'id' => array(
      'type' => 'integer',
      'null' => false,
      'default' => null,
      'unsigned' => true,
      'key' => 'primary'
    ),
    'title' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' =>
      'latin1'
    ),
    'slug' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'level' => array(
      'type' => 'integer',
      'null' => false,
      'default' => null,
      'unsigned' => false
    ),
    'indexes' => array(
      'PRIMARY' => array(
        'column' => 'id',
        'unique' => 1
      )
    ),
    'tableParameters' => array(
      'charset' => 'latin1',
      'collate' => 'latin1_swedish_ci',
      'engine' => 'InnoDB'
    )
  );

  public $trees = array(
    'id' => array(
      'type' => 'integer',
      'null' => false,
      'default' => null,
      'unsigned' => true, 'key' => 'primary'
    ),
    'title' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'content' => array(
      'type' => 'text',
      'null' => false,
      'default' => null,
      'collate' =>
      'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'author' => array(
      'type'    => 'string',
      'null'    => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'author_link' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' =>
      'latin1'
    ),
    'slug' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'status' => array(
      'type' => 'integer',
      'null' => false,
      'default' => '3',
      'unsigned' => false
    ),
    'created' => array(
      'type' => 'datetime',
      'null' => false,
      'default' => null
    ),
    'modified' => array(
      'type' => 'datetime',
      'null' => false,
      'default' => null
    ),
    'contribution_count' => array(
      'type'      => 'integer',
      'null'      => true,
      'default'   => null,
      'unsigned'  => true
    ),
    'is_end' => array(
      'type' => 'boolean',
      'null' => false,
      'default' => '0'
    ),
    'indexes' => array(
      'PRIMARY' => array(
        'column' => 'id',
        'unique' => 1
      )
    ),
    'tableParameters' => array(
      'charset' => 'latin1',
      'collate' => 'latin1_swedish_ci',
      'engine' => 'InnoDB'
    )
  );

  public $contributions = array(
    'id' => array(
      'type' => 'integer',
      'null' => false,
      'default' => null,
      'unsigned' => true,
      'key' => 'primary'
    ),
    'title' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'content' => array(
      'type'    => 'text',
      'null'    => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'slug'    => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' =>
      'latin1'
    ),
    'created' => array(
      'type' => 'datetime',
      'null' => false,
      'default' => null
    ),
    'modified' => array(
      'type' => 'datetime',
      'null' => false,
      'default' => null
    ),
    'path' => array(
      'type' => 'string',
      'null' => true,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'status' => array(
      'type' => 'integer',
      'null' => false,
      'default' => '1',
      'length' => 4,
      'unsigned' => true
    ),
    'tree_id' => array(
      'type'      => 'integer',
      'null'      => false,
      'default'   => null,
      'unsigned'  => true,
    ),
    'user_id' => array(
      'type'      => 'integer',
      'null'      => false,
      'default'   => null,
      'unsigned'  => true
    ),
    'parent_id' => array(
      'type'      => 'integer',
      'null'      => true,
      'default'   => null,
      'length'    => 5,
      'unsigned'  => true
    ),
    'lft' => array(
      'type'      => 'integer',
      'null'      => true,
      'default'   => null,
      'length'    => 5,
      'unsigned'  => true
    ),
    'rght' => array(
      'type'      => 'integer',
      'null'      => true,
      'default'   => null,
      'length'    => 5,
      'unsigned'  => true
    ),
    'isMain' => array(
      'type'      => 'boolean',
      'null'      => false,
      'default'   => '0'
    ),
    'isEnd' => array(
      'type'      => 'boolean',
      'null'      => false,
      'default'   => '0'
    ),
    'view_count' => array(
      'type'      => 'integer',
      'null'      => false,
      'default'   => '0',
      'length'    => 10,
      'unsigned'  => true,
    ),
    'letter_count' => array(
      'type'      => 'integer',
      'null'      => false,
      'default'   => '0',
      'length'    => 10,
      'unsigned'  => true
    ),
    'indexes' => array(
      'PRIMARY' => array(
        'column' => 'id',
        'unique' => 1
      )
    ),
    'tableParameters' => array(
      'charset' => 'latin1',
      'collate' => 'latin1_swedish_ci',
      'engine' => 'InnoDB'
    )
  );

  public $genres = array(
    'id' => array(
      'type' => 'integer',
      'null' => false,
      'default' => null,
      'unsigned' => true,
      'key' => 'primary'
    ),
    'title' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' =>
      'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'description' => array(
      'type' => 'text',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'indexes' => array(
      'PRIMARY' => array(
        'column' => 'id',
        'unique' => 1
      )
    ),
    'tableParameters' => array(
      'charset' => 'latin1',
      'collate' => 'latin1_swedish_ci',
      'engine' => 'InnoDB'
    )
  );

  public $mailing = array(
    'id' => array(
      'type' => 'integer',
      'null' => false,
      'default' => null,
      'unsigned' => true,
      'key' => 'primary'
    ),
    'mail' => array(
      'type' => 'string',
      'null' => false,
      'default' => null,
      'collate' => 'latin1_swedish_ci',
      'charset' => 'latin1'
    ),
    'created' => array(
      'type' => 'date',
      'null' => false,
      'default' => null
    ),
    'indexes' => array(
      'PRIMARY' => array(
        'column' => 'id',
        'unique' => 1
      )
    ),
    'tableParameters' => array(
      'charset' => 'latin1',
      'collate' => 'latin1_swedish_ci',
      'engine' => 'InnoDB'
    )
  );

}
