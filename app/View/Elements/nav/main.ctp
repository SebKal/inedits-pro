<nav class="navbar navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand-container">
        <?php echo $this->Html->image('design/header/home-logo.jpg', array('class' => array('navbar-brand'), 'url' => '/')); ?>
      </div>
      <div class="layout">
        <?php if($currentUser) : ?>
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
              <?php
                echo $this->element(
                  'users/avatar',
                  array(
                    'user'    => $currentUser,
                    'width'   => 30,
                    'height'  => 30,
                    'class'   => 'img-circle dp-pix',
                  )
                )
              ?>
              <?php echo $currentUser['name']; ?>
              <span class="caret"></span>
            </button>
            <?php echo $this->element('nav/user-dropdown', array('user' => $currentUser)) ?>
          </div>
        <?php else : ?>
          <div class="nav-registration">
            <?php echo $this->element('nav/registration') ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="<?php echo $bodyClass === 'contributions-index' ? 'active' : ''; ?>">
          <?php echo $this->Html->link('Accueil', array('controller' => 'contributions', 'action' => 'index'), array('class' => 'accueil-li')); ?>
        </li>
        <li class="<?php echo $bodyClass === 'pages-comment_ca_marche' ? 'active' : ''; ?>">
          <?php echo $this->Html->link('Comment ça marche', array('controller' => 'pages', 'action' => 'comment_ca_marche')); ?>
        </li>
        <li class="<?php echo $bodyClass === 'trees-index' ? 'active' : ''; ?>">
          <?php echo $this->Html->link('Les arbres', array('controller' => 'trees', 'action' => 'index')); ?>
        </li>
        <li class="<?php echo $bodyClass === 'users-index' ? 'active' : ''; ?>">
          <?php echo $this->Html->link('Les auteurs', array('controller' => 'users', 'action' => 'index')); ?>
        </li>
        <li>
          <a href="http://editionsinedits.com" target="_blank">Nos éditions</a>
        </li>
        <li>
          <a href="http://aide.inedits.fr">Aide</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
