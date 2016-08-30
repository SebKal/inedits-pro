<?php if ($user['role_id'] == 1): ?>
  <?php echo $this->element('nav/admin-dropdown', array('user' => $user)) ?>
<?php else: ?>
  <?php echo $this->element('nav/member-dropdown', array('user' => $user)) ?>
<?php endif; ?>
