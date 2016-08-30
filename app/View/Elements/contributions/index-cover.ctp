<div class="home-cover">
  <h1>Ecriture collaborative</h1>
  <p>
    BIENVENUE SUR NOTRE PLATEFORME D’ÉCRITURE COLLABORATIVE
  </p>
  <?php if ($currentUser) : ?>
    <?php echo $this->Html->link('Commencer<i class="fa fa-chevron-right"></i>', array('controller' => 'trees', 'action' => 'index'), array('class' => 'btn btn-shadow-yellow', 'escape' => false));?>
  <?php else : ?>
    <?php echo $this->Html->link('Commencer<i class="fa fa-chevron-right"></i>', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-shadow-yellow', 'escape' => false));?>
  <?php endif; ?>
  <?php /*echo $this->Html->link('Comment ça marche', array('controller' => 'pages', 'action' => 'comment_ca_marche'), array('class' => 'stripe'));*/ ?>
</div>
