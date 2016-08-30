<?php $this->assign('title', 'Comment ça marche') ?>
<?php $this->assign('description', 'Vous souhaitez participer à l\'écriture collaborative, voici une aide pour faire vos premiers pas sur le réseau social d’écriture.') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('global/page-cover', array('title' => 'Comment ça marche ?'));
  $this->end();
?>

<div class="featurette">


      <!-- START THE FEATURETTES -->
      <div class="container-fluid intro">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h3 class="lead">
                  Les éditions Inédits proposent, en exclusivité, le premier réseau social d’écriture collaborative !
                </h3>
              <p class="lead">
                Nous mettons en ligne un début d’histoire et faisons appel à votre créativité pour écrire la suite !<br/>
                L’histoire chemine dans plusieurs directions : une arborescence se créé…
              </p>
              <p class="lead">
                Si une histoire vous inspire, proposez une suite !

                Tentez votre chance ! Votre texte sera peut-être mis en ligne, et pourquoi pas… publié ?
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid featurette-account">
          <div class="container">
          <?php echo $this->Html->image('design/macbook_1.png', array('class' => 'img-absolute')); ?>
            <div class="row">
              <div class="col-md-6">
                <?php
                  echo $this->Html->link(
                    'Créez votre compte <strong>Inédits</strong><span class="bubble">1</span>',
                    array(
                      'controller'  => 'users',
                      'action'      => 'register',
                    ),
                    array(
                      'class'       => 'featurette-heading',
                      'escape'      => false
                    )
                  )
                ?>
                <p class="lead">
                  L’inscription est gratuite. Le formulaire une fois rempli, vous recevrez un mail de confirmation. Cliquez sur le lien afin de valider votre inscription.<br/>

                  Complétez votre profil d’auteur, personnalisez-le, il vous servira ainsi de carte de visite sur le Web !
                </p>
              </div>
            </div>
          </div>
      </div>

      <div class="container-fluid featurette-story">
          <div class="container">
          <?php echo $this->Html->image('design/macbook_3.png', array('class' => 'img-absolute')); ?>
            <div class="row">
              <div class="col-md-6 col-md-push-6">
                <!-- <h2 class="featurette-heading">Choisissez l'histoire qui vous inspire !<span class="bubble">2</span></h2> -->
                <?php
                  echo $this->Html->link(
                    'Choisissez l\'histoire qui vous inspire !<span class="bubble">2</span>',
                    array(
                      'controller'  => 'trees',
                      'action'      => 'index',
                    ),
                    array(
                      'class'       => 'featurette-heading',
                      'escape'      => false
                    )
                  )
                ?>
                <p class="lead">
                  Chaque début d’histoire donne naissance à un arbre. Explorez nos propositions et choisissez celle qui vous convient !
                </p>
              </div>
            </div>
          </div>
      </div>

      <div class="container-fluid featurette-contrib">
          <div class="container">
          <?php echo $this->Html->image('design/macbook_2.png', array('class' => 'img-absolute')); ?>
            <div class="row">
              <div class="col-md-6">
                <!-- <h2 class="featurette-heading">Écrivez et postez votre texte !<span class="bubble">3</span></h2> -->
                <?php
                  echo $this->Html->link(
                    'Écrivez et postez votre texte !<span class="bubble">3</span>',
                    array(
                      'controller'  => 'users',
                      'action'      => 'register',
                    ),
                    array(
                      'class'       => 'featurette-heading',
                      'escape'      => false
                    )
                  )
                ?>
                <p class="lead">
                  Donnez un nom à votre texte, cela permettra de repérer à quelle branche il se rattache. Vous pouvez soit télécharger votre fichier, soit écrire directement en ligne. Attention à respecter les éléments de la contribution précédente pour que l’histoire reste cohérente.<br/>

                  À son tour, votre suite pourra inspirer un autre auteur !
                </p>
              </div>
            </div>
          </div>
      </div>

      <div class="container register">
        <div class="row">
          <div class="col-sm-12">
            <div class="wrapper">
              <h3>Envie d'écrire ?</h3>
              <p>Rejoignez la première plateforme d’écriture collaborative lancée par un éditeur</p>
              <?php echo $this->Html->link('S\'inscrire<i class="fa fa-chevron-right"></i>', array('controller' => 'users', 'action' => 'register'), array('escape' => false, 'class' => 'btn btn-shadow-blue')); ?>
            </div>
          </div>
        </div>
      </div>

      <!-- /END THE FEATURETTES -->

</div>

<!-- Commit -->
