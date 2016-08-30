<!-- META -->
<?php $this->assign('title', 'Le premier site d’écriture collaborative') ?>
<?php $this->assign('description', 'Bienvenue sur notre site internet. Nous aimons découvrir de nouveaux talents littéraires, alors pourquoi pas vous ? Inscrivez-vous et inventez les histoires de demain.') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('contributions/index-cover');
  $this->end();
?>

<section class="container-fluid last-trees white-bg">
  <div class="container">
    <h4 class="title-section"><em>Les derniers arbres</em></h4>
    <div class="row">
      <?php foreach ($trees as $tree) : ?>
        <?php echo $this->element('trees/last-trees', array('tree' => $tree)); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="container-fluid last-trees">
  <div class="container">
    <h4 class="title-section"><em>Les dernières participations</em></h4>
    <div class="row">
      <?php foreach ($contribs as $contrib) : ?>
        <?php echo $this->element('contributions/last-contributions', array('contrib' => $contrib)); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="container-fluid pop-user">
  <div class="container">
    <h4 class="title-section">Les auteurs les plus actifs</h4>
    <?php echo $this->element('users/best-users'); ?>
  </div>
  <?php echo $this->Html->link('Nos auteurs', array('controller' => 'users', 'action' => 'index'), array('class' => 'btn btn-block btn-shadow-gray')) ?>
</section>
