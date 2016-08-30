<?php echo $this->Form->create([], array('url' => array('controller' => 'users', 'action' => 'begin'))) ?>
  <?php echo $this->Form->input('access_token', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => 'Votre prénom', 'value' => $currentUser['name'])); ?>
<?php echo $this->Form->end() ?>
