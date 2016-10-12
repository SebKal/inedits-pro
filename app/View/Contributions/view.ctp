<?php $this->assign('title', $contribution['Contribution']['title']) ?>
<?php $this->assign('description', 'Lisez '.$contribution['Contribution']['title'].' écrit par '.$contribution['User']['name'].' '.$contribution['User']['last_name'].' sur Inédits.') ?>

<section class="container-fluid contribution-wrapper">
  <div class="container contribution">
    <div class="row">
      <div class="col-xs-12 col-sm-9 contrib-article">
        <div class="contrib-header">
          <h1><?php echo $contribution['Contribution']['title']; ?></h1>
          <div class="contrib-meta">
            <ul class="list-unstyled list-inline">
              <!-- <li>
                Arbre:
                <?php
                  echo $this->Html->link(
                  $contribution['Tree']['title'], array(
                    'controller'  => 'trees',
                    'action'      => 'view',
                    'slug'        => $contribution['Tree']['slug']
                  ));
                ?>
                <i class="fa fa-chevron-right"></i>
              </li> -->
              <?php if (isset($parent2)): ?>
                <li>
                  <span>
                    <?php
                      echo $this->Html->link(
                        $parent2['Contribution']['title'],
                        array(
                          'controller'  => 'contributions',
                          'action'      => 'view',
                          'title'       => $contribution['Tree']['slug'],
                          'slug'        => $parent2['Contribution']['slug']
                        )
                      );
                    ?>
                  </span>
                  <i class="fa fa-chevron-right"></i>
                </li>
              <?php endif; ?>
              <?php if (isset($parent1)): ?>
                <li>
                  <span>
                    <?php
                      echo $this->Html->link(
                        $parent1['Contribution']['title'],
                        array(
                          'controller'  => 'contributions',
                          'action'      => 'view',
                          'title'       => $contribution['Tree']['slug'],
                          'slug'        => $parent1['Contribution']['slug']
                        )
                      );
                    ?>
                  </span>
                  <i class="fa fa-chevron-right"></i>
                </li>
              <?php endif; ?>
              <li>
                <span>
                  <?php echo $contribution['Contribution']['title']; ?>
                </span>
              </li>
            </ul>
          </div>
          <?php
            echo $this->Html->link('Retour à l\'arbre',
              array(
                'controller'  => 'trees',
                'action'      => 'view',
                'slug'        => $contribution['Tree']['slug'],
              ),
              array(
                'class'       => 'btn btn-black'
              )
            );
          ?>
        </div>
        <div class="portlet light">
          <div class="portlet-body contrib-content">
              <p><?php echo $contribution['Contribution']['content']; ?></p>
              <p>A suivre</p>
          </div>
        </div>
        <div class="contrib-footer">
          <?php
            echo $this->Html->link('Retour à l\'arbre',
              array(
                'controller'  => 'trees',
                'action'      => 'view',
                'slug'        => $contribution['Tree']['slug'],
              ),
              array(
                'class'       => 'btn btn-black'
              )
            );
          ?>
        </div>
      </div>
      <div class="col-xs-12 col-sm-3 contrib-sidebar">
          <div class="contrib-avatar">
            <?php echo $contribution['User']['avatar'] ? $this->Image->resize($contribution['User']['avatar'], 350, 350, array('class' => 'img-responsive', 'url' => array('controller' => 'users', 'action' => 'profile', $contribution['User']['slug']))) : $this->Image->resize('default.jpg', 350, 350, array('class' => 'img-responsive', 'url' => array('controller' => 'users', 'action' => 'profile', $contribution['User']['slug']))); ?>
          </div>
          <div class="contrib-user">
            <p>Contribution de</p>
            <h3><?php echo $contribution['User']['name'].' '. $contribution['User']['last_name']; ?></h3>
          </div>
          <div class="contrib-call">
            <h3>Cette histoire vous inspire ?</h3>
            <p>
              In&dits est le premier site d’écriture collaborative.
              Ecrivons ensemble les histoires
              de demain et faites-vous éditer.
            </p>
            <?php echo $this->Html->link('Ecrivez la suite', array('controller' => 'contributions', 'action' => 'add', 'arbre' => $contribution['Tree']['slug'], 'contribution' => $contribution['Contribution']['id'], 'user' => $contribution['User']['id']), array('class' => 'btn btn-block')); ?>
          </div>
          <?php echo $this->Html->link('<i class="glyphicon glyphicon-flag"></i> Signaler un abus', '#report-contribution', array('class' => 'btn btn-shadow-gray btn-block', 'escape' => false, 'data-toggle' => "modal")) ?>
          <div class="contrib-meta">
            <ul class="list-unstyled">
              <li><b>Ajoutée le</b> : <?php echo date('d/m/Y', strtotime($contribution['Contribution']['created'])); ?></li>
              <li><b>Déjà lue</b> : <?php echo $contribution['Contribution']['view_count'] ?> fois</li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>
<?php echo $this->element('contributions/report-abuse-modal');
