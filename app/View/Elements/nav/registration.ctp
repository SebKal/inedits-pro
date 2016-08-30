<?php
  echo $this->Html->link(
    'Connexion',
    array(
      'controller'  => 'users',
      'action'      => 'login',
      'admin'       => false
    ),
    array(
      'class'       => 'btn btn-shadow-yellow',
      'escape'      => false
    )
  );
?>
<?php
  echo $this->Html->link(
    'Inscription',
    array(
      'controller'  => 'users',
      'action'      => 'register',
      'admin'       => false
    ),
    array(
      'class'       => 'btn btn-shadow-gray',
      'escape'      => false
    )
  );
?>
<?php
  echo $this->Html->link(
    '<i class="fa fa-user"></i>',
    array(
      'controller'  => 'users',
      'action'      => 'login',
      'admin'       => false
    ),
    array(
      'class'       => 'btn btn-shadow-yellow btn-icon',
      'escape'      => false
    )
  );
?>
<?php
  echo $this->Html->link(
    '<i class="fa fa-plus"></i>',
    array(
      'controller'  => 'users',
      'action'      => 'register',
      'admin'       => false
    ),
    array(
      'class'       => 'btn btn-shadow-gray btn-icon',
      'escape'      => false
    )
  );
?>
