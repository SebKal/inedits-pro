<div class="profil-cover">
  <?php if (!empty($user['User']['cover'])) : ?>
      <?php echo $this->Image->resize($user['User']['cover'], 1920, 270, array('class' => 'img-responsive')); ?>
  <?php else : ?>
      <?php echo $this->Html->image(DEFAULT_COVER, array('class' => 'img-responsive')); ?>
  <?php endif; ?>
  <div class="shadow"></div>
</div>
