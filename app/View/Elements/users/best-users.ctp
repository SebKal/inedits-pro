<div class="row">
  <?php foreach ($bestUsers as $user) : ?>
    <div class="col-xs-6 col-sm-3">
      <div class="user-portlet">
        <div class="user-portlet-header">
          <?php if ($user['User']['cover']) : ?>
            <?php
              echo $this->Image->resize($user['User']['cover'], 400, 200, array('class' => 'img-responsive'));
            ?>
          <?php else : ?>
            <?php
              echo $this->Image->resize(
                'default.jpg',
                400,
                200,
                array(
                  'class' => 'img-responsive',
                )
              );
            ?>
          <?php endif; ?>
          <div class="layout">
            <?php
              echo $user['User']['avatar'] ?
                $this->Image->resize(
                  $user['User']['avatar'],
                  100,
                  100,
                  array(
                    'class' => 'img-circle',
                    'url'   => array(
                      'controller'  => 'users',
                      'action'      => 'profile',
                      'slug'        => $user['User']['slug'],
                    ),
                  )
                ) :
                $this->Image->resize(
                  'default.jpg',
                  100,
                  100,
                  array(
                    'class' => 'img-circle',
                    'url'   => array(
                      'controller'  => 'users',
                      'action'      => 'profile',
                      $user['User']['slug'],
                    ),
                  )
                );
            ?>
          </div>
        </div>
        <div class="user-portlet-content">
          <h4 style="text-transform: capitalize;">
            <?php
              echo $this->Html->link(
                $user['User']['name'].' '.$this->Text->truncate($user['User']['last_name'], 1, array('ellipsis' => '')).'.',
                array(
                  'controller'  => 'users',
                  'action'      => 'profile',
                  'slug'        => $user['User']['slug'],
                )
              );
            ?>
          </h4>
          <p><?php echo $this->Text->truncate($user['User']['bio'], 100, array('ellipsis' => '...', 'exact' => true)); ?></p>
        </div>
        <div class="user-portlet-addon">
          <span>Branches écrites : </span>
          <span><b><?php echo $user['User']['contribution_count']; ?></b></span>
        </div>
        <div class="user-portlet-addon">
          <span>Nouvelles éditées : </span>
          <span><b><?php echo $user['User']['contribution_count']; ?></b></span>
        </div>
        <div class="user-portlet-footer">
          <?php echo $this->Html->link('Voir son profil', array('controller' => 'users', 'action' => 'profile', 'slug' => $user['User']['slug']), array('class' => 'btn btn-portlet')) ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
