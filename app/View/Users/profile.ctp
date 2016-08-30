<?php $this->assign('title', $user['User']['name'].' '.$user['User']['last_name'].' - Inédits') ?>
<?php $this->assign('description', 'Découvrez les œuvres de '.$user['User']['name'].' '.$user['User']['last_name'].' sur Inédits.') ?>

<?php echo $this->element('users/profil-cover') ?>

<section id="profile" class="container">
  <div class="row">
    <?php echo $this->element('users/profil-sidebar') ?>

    <?php if (!isset($emptyProfil)): ?>
      <?php echo $this->element('users/profil-content') ?>
    <?php else: ?>
      <?php echo $this->element('users/profil-empty') ?>
    <?php endif; ?>
  </div>
</section>
