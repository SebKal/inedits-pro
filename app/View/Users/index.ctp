<?php $this->assign('title', 'Liste des auteurs d\'ériture collaborative') ?>
<?php $this->assign('description', 'Notre outil d\'écriture collaborative permet de stimuler la création littéraire, et si vous aussi vous aviez du talent ?') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('global/page-cover', array('title' => 'Les auteurs'));
  $this->end();
?>

<?php if (isset($users) && count($users) == 0) : ?>
  <section class="container-fluid results">
    <div class="container">
      <p>Aucun utilisateur pour cette entreprise.</p>
    </div>
  </section>
<?php elseif (isset($users) && count($users) > 0) : ?>
<section class="container-fluid results">
    <div class="container">
      <div class="row">
        <?php foreach ($users as $value) : ?>
          <div class="col-xs-12 col-sm-3">
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
              <div class="user-portlet-addon">
                <span>Branches écrites : </span>
                <span><b><?php echo $value['User']['contribution_count']; ?></b></span>
              </div>
              <div class="user-portlet-addon">
                <span>Nouvelles éditées : </span>
                <span><b><?php echo $value['User']['contribution_count']; ?></b></span>
              </div>
<!--               <div class="user-portlet-footer">
                <?php echo $this->Html->link('Voir son profil', array('controller' => 'users', 'action' => 'edit', 'slug' => $value['User']['slug']), array('class' => 'btn btn-portlet')) ?>
              </div> -->
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
</section>
<?php endif; ?>

