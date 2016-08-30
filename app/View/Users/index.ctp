<?php $this->assign('title', 'Liste des auteurs d\'ériture collaborative') ?>
<?php $this->assign('description', 'Notre outil d\'écriture collaborative permet de stimuler la création littéraire, et si vous aussi vous aviez du talent ?') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('users/index-cover');
  $this->end();
?>

<?php if (isset($results) && count($results) == 0) : ?>
  <section class="container-fluid results">
    <div class="container">
      <p>Aucun résultat pour cette recherche.</p>
    </div>
  </section>
<?php elseif (isset($results) && count($results) > 0) : ?>
<section class="container-fluid results">
    <div class="container">
      <h4 class="title-section">Résultats</h4>
      <div class="row">
        <?php foreach ($results as $value) : ?>
          <div class="col-lg-3">
            <div class="user-portlet">
              <div class="user-portlet-header">
                <?php if ($value['User']['cover']) : ?>
                  <?php echo $this->Image->resize($value['User']['cover'], 400, 200, array('class' => 'img-responsive')); ?>
                <?php else : ?>
                  <?php echo $this->Image->resize('default.jpg', 400, 200, array('class' => 'img-responsive')); ?>
                <?php endif; ?>
                <div class="layout">
                  <?php if ($value['User']['avatar']) : ?>
                    <?php echo $this->Image->resize($value['User']['avatar'], 100, 100, array('class' => 'img-circle')); ?>
                  <?php else : ?>
                    <?php echo $this->Image->resize('default.jpg', 100, 100, array('class' => 'img-circle')); ?>
                  <?php endif; ?>
                </div>
              </div>
              <div class="user-portlet-content">
                <h4 style="text-transform: capitalize;"><?php echo $value['User']['name'].' '.$this->Text->truncate($value['User']['last_name'], 1, array('ellipsis' => '')).'.'; ?></h4>
                <p><?php echo $this->Text->truncate($value['User']['bio'], 100, array('ellipsis' => '...', 'exact' => true)); ?></p>
              </div>
              <div class="user-portlet-addon">
                <span>Branches écrites : </span>
                <span><b><?php echo $value['User']['contribution_count']; ?></b></span>
              </div>
              <div class="user-portlet-addon">
                <span>Nouvelles éditées : </span>
                <span><b><?php echo $value['User']['contribution_count']; ?></b></span>
              </div>
              <div class="user-portlet-footer">
                <?php echo $this->Html->link('Voir son profil', array('controller' => 'users', 'action' => 'profile', 'slug' => $value['User']['slug']), array('class' => 'btn btn-portlet')) ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</section>
<?php endif; ?>

<section class="container-fluid pop-user">
  <div class="container">
    <h4 class="title-section">Voir nos auteurs</h4>
    <?php echo $this->element('users/best-users'); ?>
  </div>
</section>

