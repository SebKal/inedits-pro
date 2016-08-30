<div class="container">
  <div class="login-box">
    <div class="box-content">
      <?php echo $this->Form->create([], array('url' => array('controller' => 'users', 'action' => 'begin'))) ?>
        <?php echo $this->Form->input('access_token', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => '')); ?>
        <button class="btn btn-shadow-blue" type="submit">Se connecter</button>
      <?php echo $this->Form->end(); ?>
    </div>
    <div class="box-footer">
      <?php echo $this->Html->link('Mot de passe oublié ?', array('controller' => 'users', 'action' => 'forgetPassword')); ?>
    </div>
  </div>
</div>
