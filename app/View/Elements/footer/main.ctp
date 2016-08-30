<footer>
  <div class="footer-header container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <p>
            Vous connaissez un auteur talentueux ?
          </p>
          <p class="brown">
            Inscrivez-vite son adresse email, nous lui enverrons une invitation pour qu’il découvre notre plateforme collaborative !
          </p>
        </div>
        <div class="col-lg-6">
          <div id="mailSubscribe">
            <?php $userName = $currentUser ? $currentUser['name'].' '.$currentUser['last_name'] : null ?>
            <?php echo $this->Form->create('Mailing', array( 'url' => array('action' => 'add'), 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))); ?>
              <div class="input-group">

              <?php echo $this->Form->input('mail', array( 'type' => 'mail', 'class' => 'form-control mail-subscribe', 'placeholder' => 'Adresse Email'));?>
              <?php echo $this->Form->input('username', array( 'type' => 'hidden', 'value' => $userName));?>
                      <span class="input-group-btn">
                  <button class="btn" type="submit">OK</button>
                </span>
                    </div>
                  <?php echo $this->Form->end(); ?>
                </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-content">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-3 footer-col">
          <p class="footer-title">Derniers arbres</p>
          <ul class="footer-trees">
            <?php foreach ($lastTrees as $value) : ?>
              <li><?php echo $this->Html->link($value['Tree']['title'], array('controller' => 'trees', 'action' => 'view', 'slug' => $value['Tree']['slug'])); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3 footer-col">
          <p class="footer-title">A propos</p>
          <ul class="footer-about">
            <li>La plateforme d’écriture collaborative est développée par les Éditions Inédits.</li>
            <li>
              Cette plateforme est un nouveau concept de réseau social d’écriture. Sa vocation est de permettre
              aux auteurs d’écrire ensemble des histoires. Après validation de l’éditeur, ces histoires seront
              proposées en ligne et pourront éventuellement aboutir à une publication imprimée.
            </li>
            <li>
              Chaque auteur pourra créer son profil et bénéficier ainsi d’une visibilité sur notre site.
            </li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3">
          <p class="footer-title">Derniers Membres</p>
          <ul class="footer-members">
            <?php foreach ($lastUsers as $value) : ?>
              <li class="clearfix">

                <span><?php echo $value['User']['avatar'] ? $this->Image->resize($value['User']['avatar'], 30, 30, array('class' => 'img-circle')) : $this->Image->resize('default.jpg', 30, 30, array('class' => 'img-circle')); ?></span>
                <span><?php echo $this->Html->link($value['User']['name'].' '.$this->Text->truncate($value['User']['last_name'], 1, array('ellipsis' => '')), array('controller' => 'users', 'action' => 'profile', 'slug' => $value['User']['slug'])); ?></b> s'est inscrit sur notre site le <?php echo date( 'd/m/Y',strtotime($value['User']['created'])); ?><span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-3">
          <ul class="footer-stats">
            <li><?php echo $this->Html->Image('design/header/home-logo.png', array('class' => 'img-circle', 'width' => 40, 'height' => 40)); ?></li>
            <li><span><?php echo count($approvedUsers) ?></span>Membres inscrits</li>
            <hr>
            <li><span><?php echo $approvedContrib ?></span>Contributions écrites</li>
            <hr>
            <li><span><?php echo $letterCount[0][0]['total'] !== 0 ? $letterCount[0][0]['total'] : '0'; ?></span>Caractères écrits</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
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
