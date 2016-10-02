<!-- META -->
<?php $this->assign('title', 'Le premier site d’écriture collaborative') ?>
<?php $this->assign('description', 'Bienvenue sur notre site internet. Nous aimons découvrir de nouveaux talents littéraires, alors pourquoi pas vous ? Inscrivez-vous et inventez les histoires de demain.') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('contributions/index-cover');
  $this->end();
?>
