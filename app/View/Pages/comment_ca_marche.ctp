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
                  INEDITS vous ouvre un accès privé à sa plateforme d'écriture collaborative.
                </h3>
              <p class="lead">
                Un début d'histoire est mis en ligne par l'animateur de votre groupe : à votre tour, venez écrire des suites possibles ! L'histoire chemine dans plusieurs directions, une arborescence se créé...
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
                  Complétez votre profil. Le formulaire une fois rempli, vous recevrez un mail de confirmation. Cliquez sur le lien afin de valider votre inscription.
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
                    'Rendez-vous sur l\'Arbre de votre histoire<span class="bubble">2</span>',
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
                  Cliquez sur le début de l'histoire pour le découvrir, puis, par la suite, sur les différentes branches pour découvrir les contributions des autres.
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
                  Trouvez-lui un titre. Vous pouvez soit télécharger votre fichier, soit écrire directement en ligne. Attention à respecter les éléments de la contribution précédente pour que l’histoire reste cohérente.<br>
                  À son tour, votre suite pourra inspirer un autre membre de votre groupe !
                </p>
              </div>
            </div>
          </div>
      </div>

      <!-- /END THE FEATURETTES -->

</div>

<!-- Commit -->
