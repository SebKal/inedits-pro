<footer>
  <div class="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-xs-12">
          Copyright © 2016 · All Rights Reserved
        </div>
        <div class="col-sm-8 col-xs-12">
          <ul class="list-unstyled list-inline">
            <li>
              <?php echo $this->Html->link('Accueil', array('controller' => 'contributions', 'action' => 'index')); ?>
            </li>
            <li>
              <?php echo $this->Html->link('Comment ça marche', array('controller' => 'pages', 'action' => 'comment_ca_marche')); ?>
            </li>
            <li>
              <?php echo $this->Html->link('Les arbres', array('controller' => 'trees', 'action' => 'index')); ?>
            </li>
            <li>
              <?php echo $this->Html->link('Les auteurs', array('controller' => 'users', 'action' => 'index')); ?>
            </li>
            <li>
              <?php echo $this->Html->link('S\'inscrire', array('controller' => 'users', 'action' => 'register')); ?>
            </li>
            <li>
              <?php echo $this->Html->link('Se connecter', array('controller' => 'users', 'action' => 'login')); ?>
            </li>
            <li>
              <?php echo $this->Html->link('Mentions Légales', array('controller' => 'pages', 'action' => 'display', 'mentions')); ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
