<div class="col-sm-4 tree-index-box">
  <div class="participation">
        <div class="part-header">
          <div>
              <h3><?php echo $tree['Tree']['title']; ?></h3>
          </div>
        </div>
        <div class="part-content">
            <div class="row">
                <div class="col-sm-3">
                    <p class="part-title">EXTRAIT</p>
                </div>
                <div class="col-sm-9">
                    <div class="excerpt">
                    <?php echo $this->Text->truncate($tree['Tree']['content'], 100, array('ellipsis' => '...', 'exact' =>false)); ?>
                    </div>
                    <p>
                        <?php echo $this->Html->link('Lire la suite', array('controller' => 'trees', 'action' => 'view', 'slug' => $tree['Tree']['slug']), array('class' => 'read-more'));?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <p class="part-title">AUTEURS</p>
                </div>
                <div class="col-sm-9">
                    <?php if ($tree['Tree']['users']) : ?>
                        <ul class="list-inline">
                            <?php foreach ($tree['Tree']['users'] as $value) : ?>
                                <li><?php echo $value['User']['avatar'] ? $this->Image->resize($value['User']['avatar'] , 40, 40, array('class' => 'img-circle', 'url' => array('controller' => 'users', 'action' => 'profile', 'slug' => $value['User']['slug']) )) : $this->Image->resize('avatars/default/avatar.jpg', 40, 40, array('class' => 'img-circle', 'url' => array('controller' => 'users', 'action' => 'profile', 'slug' => $value['User']['slug']) )); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p>Soyez le premier contributeur de cet arbre !</p>
                    <?php endif; ?>
                </div>
            </div>
            <hr class="no-margin">
        </div>
        <div class="part-footer">
            <?php echo $this->Html->link('Lire', array('controller' => 'trees', 'action' => 'view','slug' => $tree['Tree']['slug']), array('class' => 'btn btn-shadow-yellow'));?>
            <?php if (!isset($currentUser)) : ?>
              <?php echo $this->Html->link('Participer', array('controller' => 'users', 'action' => 'register'), array('class' => 'btn btn-shadow-gray'));?>
            <?php endif; ?>
        </div>
    </div>
</div>
