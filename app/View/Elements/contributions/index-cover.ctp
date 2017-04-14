<div class="home-cover">
  <h1>Ecriture collaborative</h1>
  <p>
    BIENVENUE SUR VOTRE ESPACE DÉDIÉ
  </p>
  <?php if ($currentUser) : ?>
    <?php echo $this->Html->link('Commencer<i class="fa fa-chevron-right"></i>', array('controller' => 'trees', 'action' => 'index'), array('class' => 'btn btn-shadow-yellow', 'escape' => false));?>
  <?php else : ?>
    <?php echo $this->Html->link('Connexion<i class="fa fa-chevron-right"></i>', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-shadow-yellow', 'escape' => false));?>
    <?php echo $this->Html->link('Inscription<i class="fa fa-chevron-right"></i>', array('controller' => 'users', 'action' => 'register'), array('class' => 'btn btn-shadow-gray', 'escape' => false));?>
  <?php endif; ?>
</div>
