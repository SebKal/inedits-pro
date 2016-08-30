<div class="container">
  <div class="access-box">
    <div class="access-box-content">
      <?php echo $this->Form->create([], array('url' => array('controller' => 'users', 'action' => 'begin'))) ?>
        <?php echo $this->Form->input('access_token', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => '')); ?>
        <button class="btn btn-shadow-blue" type="submit">Se connecter</button>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
