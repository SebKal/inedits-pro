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
        <?php if ($currentUser): ?>
          <?php echo $this->Html->image('../css/pro/'.$currentUser['Entreprise']['slug'].'/'.$currentUser['Entreprise']['slug'].'.svg', array('class' => array('navbar-brand'), 'url' => '/')); ?>
        <?php else: ?>
          <?php echo $this->Html->image('design/header/home-logo.png', array('class' => array('navbar-brand'), 'url' => '/')); ?>
        <?php endif ?>
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
        <?php if ($currentUser): ?>
          <li class="<?php echo $bodyClass === 'trees-index' ? 'active' : ''; ?>">
            <?php echo $this->Html->link('Les arbres', array('controller' => 'trees', 'action' => 'index')); ?>
          </li>
          <?php if ($currentUser['role_id'] == 1 || $currentUser['role_id'] == 4): ?>
            <div class="dropdown">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Les auteurs
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <?php foreach ($rootEntreprises as $value): ?>
                  <li>
                    <?php
                      echo $this->Html->link(
                        $value['name'],
                        array(
                          'controller'  => 'users',
                          'action'      => 'index',
                          'admin'       => true,
                          'id'          => $value['id'],
                        )
                      );
                    ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php else: ?>
            <li class="<?php echo $bodyClass === 'users-index' ? 'active' : ''; ?>">
              <?php echo $this->Html->link('Les auteurs', array('controller' => 'users', 'action' => 'index', 'id' => $currentUser['entreprise_id'])); ?>
            </li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
