<div class="col-xs-12 col-sm-6">
  <div class="participation">
    <div class="part-header">
      <div>
        <h3><?php echo $contrib['Contribution']['title']; ?></h3>
        <span>Arbre : <?php echo $contrib['Tree']['title']; ?></span>
      </div>
    </div>
    <div class="part-content">
        <div class="row">
            <div class="col-sm-2">
                <p class="part-title">EXTRAIT</p>
            </div>
            <div class="col-sm-10">
                <div class="excerpt">
                <?php echo $this->Text->truncate($contrib['Contribution']['content'], 200, array('ellipsis' => '...', 'exact' =>false)); ?>
                </div>
                <p>
                    <?php echo $this->Html->link('Lire la suite', array('controller' => 'contributions', 'action' => 'view', 'title' => $contrib['Tree']['slug'], 'slug' => $contrib['Contribution']['slug']), array('class' => 'read-more'));?>
                </p>
            </div>
        </div>
        <div class="row author-list">
            <div class="col-sm-2">
                <p class="part-title">AUTEURS</p>
            </div>
            <div class="col-sm-10">
                <?php if ($contrib['Tree']['users']) : ?>
                    <ul class="list-inline">
                        <?php foreach ($contrib['Tree']['users'] as $value) : ?>
                            <li>
                              <?php
                                echo $this->element(
                                  'users/avatar',
                                  array(
                                    'user'    => $value['User'],
                                    'width'   => 50,
                                    'height'  => 50,
                                    'class'   => 'img-circle',
                                    'url'     => array('controller' => 'users', 'action' => 'profile', 'slug' => $value['User']['slug'])
                                  )
                                )
                              ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else : ?>
                    <p>Soyez le premier contributeur de cette nouvelle !</p>
                <?php endif; ?>
            </div>
        </div>
        <hr class="no-margin">
    </div>
    <div class="part-footer">
        <?php echo $this->Html->link('Lire', array('controller' => 'trees', 'action' => 'view','slug' => $contrib['Tree']['slug']), array('class' => 'btn btn-shadow-yellow'));?>
        <?php if (!isset($currentUser)) : ?>
          <?php echo $this->Html->link('Participer', array('controller' => 'users', 'action' => 'register'), array('class' => 'btn btn-shadow-gray')); ?>
        <?php endif; ?>
    </div>
  </div>
</div>
