<div class="col-xs-12 col-sm-9 profile-content">
  <p class="user-name"><?php echo $user['User']['name'].' '.$user['User']['last_name']; ?></p>

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
