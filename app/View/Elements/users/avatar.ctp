<?php
  $options['class']   = isset($class) ? $class : null;
  $options['url']     = isset($url) ? $url : null;
  $options['title']   = $user['last_name'].'-'.$user['name'];
  $options['alt']     = $user['last_name'].'-'.$user['name'];
?>
<?php if (!empty($user['avatar'])) : ?>
    <?php echo $this->Image->resize($user['avatar'] , $width, $height, $options); ?>
<?php else : ?>
    <?php echo $this->Image->resize(DEFAULT_AVATAR, $width, $height, $options); ?>
<?php endif; ?>
