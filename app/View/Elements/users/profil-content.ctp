<div class="col-xs-12 col-sm-9 profile-content">
  <p class="user-name"><?php echo $user['User']['name'].' '.$user['User']['last_name']; ?></p>

  <?php if (!empty($user['User']['bio'])) : ?>
    <div class="portlet light user-bio center">
      <div class="portlet-body">
        <p class="profile-title">BIO</p>
        <p><?php echo $user['User']['bio']; ?></p>
      </div>
    </div>
  <?php else : ?>
    <div class="user-bio">
      <p>Vous n'avez pas encore de bio.</p>
    </div>
  <?php endif; ?>

  <div class="row">
    <?php if(!empty($user['User']['favorite_author'])) : ?>
      <div class="col-xs-6 col-sm-6">
        <div class="portlet light">
          <div class="portlet-body">
            <p class="profile-title">Auteurs préférés</p>
            <p><?php echo $user['User']['favorite_author'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(!empty($user['User']['favorite_book'])) : ?>
      <div class="col-xs-6 col-sm-6">
        <div class="portlet light">
          <div class="portlet-body">
            <p class="profile-title">Livres préférés</p>
            <p><?php echo $user['User']['favorite_book'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(!empty($user['User']['inspiration'])) : ?>
      <div class="col-xs-6 col-sm-6">
        <div class="portlet light">
          <div class="portlet-body">
            <p class="profile-title">Inspiration du moment</p>
            <p><?php echo $user['User']['inspiration'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(!empty($user['User']['style'])) : ?>
      <div class="col-xs-6 col-sm-6">
        <div class="portlet light">
          <div class="portlet-body">
            <p class="profile-title">Style d'écriture</p>
            <p><?php echo $user['User']['style'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(!empty($user['User']['genre'])) : ?>
      <div class="col-xs-6 col-sm-6">
        <div class="portlet light">
          <div class="portlet-body">
            <p class="profile-title">Genre(s) de prédilection</p>
            <p><?php echo $user['User']['genre'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if(!empty($user['User']['social_writting'])) : ?>
      <div class="col-xs-6 col-sm-6">
        <div class="portlet light">
          <div class="portlet-body">
            <p class="profile-title">En quoi l'écriture le motive-t-elle ?</p>
            <p><?php echo $user['User']['social_writting'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <div class="participations">
    <?php if(!empty($trees)) : ?>

      <p class="profile-title">Dernière participation</p>

      <?php foreach ($trees as $tree) : ?>

        <div class="participation">
          <div class="part-header">
            <div>
                <h3><?php echo $tree['Tree']['title']; ?></h3>
            </div>
          </div>
          <div class="part-content">
            <div class="row">
              <div class="col-sm-2">
                  <p class="part-title">EXTRAIT</p>
              </div>
              <div class="col-sm-10">
                  <div class="excerpt">
                    <?php echo $this->Text->truncate($tree['Contribution']['content'], 300, array('ellipsis' => '...', 'exact' =>false)); ?>
                  </div>
                  <p>
                    <?php echo $this->Html->link('Lire la suite', array('controller' => 'contributions', 'action' => 'view', 'title' => $tree['Tree']['slug'],'slug' => $tree['Contribution']['slug']), array('class' => 'read-more'));?>
                  </p>
              </div>
            </div>
            <div class="row author-list">
              <div class="col-sm-2">
                  <p class="part-title">AUTEURS</p>
              </div>
              <div class="col-sm-10">
                <ul class="list-inline">
                  <?php foreach ($tree['Tree']['users'] as $value) : ?>
                    <li><?php echo $value['User']['avatar'] ? $this->Image->resize($value['User']['avatar'] , 50, 50, array('class' => 'img-circle', 'url' => array('controller' => 'users', 'action' => 'profile', 'slug' => $value['User']['slug']))) : $this->Image->resize('avatars/default/avatar.jpg' , 50, 50, array('class' => 'img-circle', 'url' => array('controller' => 'users', 'action' => 'profile', 'slug' => $value['User']['slug']))); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <hr class="no-margin">
          </div>
          <div class="part-footer">
            <?php echo $this->Html->link('Voir l\'arbre', array('controller' => 'trees', 'action' => 'view','slug' => $tree['Tree']['slug']), array('class' => 'btn btn-shadow-yellow'));?>
          </div>
        </div>

      <?php endforeach; ?>

    <?php else : ?>
      <p class="recall">N'hésitez pas à découvrir <?php echo $this->Html->link('les arbres', array('controller' => 'trees', 'action' => 'index')); ?> et participer sur un projet d'écriture collaborative !</p>
    <?php endif; ?>
  </div>
</div>
