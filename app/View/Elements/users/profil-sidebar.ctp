<div class="col-xs-6 col-sm-3 profile-sidebar">
  <div class="profile-userpic">
    <?php
      echo $this->element(
        'users/avatar',
        array(
          'user'    => $user['User'],
          'width'   => 470,
          'height'  => 470,
          'class'   => 'img-responsive',
        )
      )
    ?>
  </div>
  <div class="actions-links">
    <?php if($currentUser && $currentUser['id'] == $user['User']['id'] || $currentUser['role_id'] == 1) : ?>
      <?php echo $this->Html->link('Modifier mon Profil', array('action' => 'edit', 'slug' => $user['User']['slug']), array('class' => 'btn btn-shadow-gray btn-block margin-top-20') ); ?>
    <?php endif; ?>
  </div>
  <?php if ($user['User']['facebook'] || $user['User']['twitter'] || $user['User']['website']) : ?>
    <div class="portlet light social-links">
      <div class="portlet-body">
        <p class="profile-title">Ses réseaux</p>
        <p>
          <?php if ($user['User']['facebook']): ?>
            <?php
              echo $this->Html->link('<i class="fa fa-facebook-square" aria-hidden="true"></i> Son compte Facebook', $user['User']['facebook'], array('escape' => false, 'full_base' => true));
            ?>
          <?php endif; ?>
        </p>
        <p>
          <?php if ($user['User']['twitter']): ?>
            <?php
              echo $this->Html->link('<i class="fa fa-twitter-square" aria-hidden="true"></i> Son compte Twitter', $user['User']['twitter'], array('escape' => false, 'full_base' => true));
            ?>
          <?php endif; ?>
        </p>
        <p>
          <?php if ($user['User']['website']): ?>
            <?php
              echo $this->Html->link('<i class="fa fa-external-link" aria-hidden="true"></i> Son Site', $user['User']['website'], array('escape' => false, 'full_base' => true));
            ?>
          <?php endif; ?>
        </p>
      </div>
    </div>
  <?php endif; ?>
</div>
