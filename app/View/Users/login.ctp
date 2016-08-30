<!-- META -->
<?php $this->assign('title', 'Connectez vous à votre compte') ?>
// <?php $this->assign('description', 'Accédez à votre compte sur notre site internet, le premier réseau social d\'écriture collaborative') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('global/page-cover', array('title' => 'Se connecter'));
  $this->end();
?>

<section id="login" class="container">
  <div class="row">
    <div class="col-lg-6">
      <div class="login-box">
        <div class="box-content">
          <?php echo $this->Form->create('User', array('class'=>'login-form', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false)));?>
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
              <?php echo $this->Form->input('mail', array('autocomplete' => 'off', 'type' => 'mail', 'placeholder' => 'Email', 'class' => array('form-control'), 'aria-describedby' => 'basic-addon1') );?>
            </div>

            <div class="input-group">
              <span class="input-group-addon" id="basic-addon2"><i class="glyphicon glyphicon-lock"></i></span>
              <?php echo $this->Form->input('password', array('autocomplete' => 'off', 'type' => 'password', 'placeholder' => 'Mot de Passe' ));?>
            </div>
            <div class="checkbox">
              <label>
                <?php echo $this->Form->input('remember_me', array('type' => 'checkbox', 'class' => ''));?>
                Se souvenir de moi
              </label>
            </div>
            <button class="btn btn-shadow-blue" type="submit">Se connecter</button>
          <?php echo $this->Form->end(); ?>
        </div>
        <div class="box-footer">
          <?php echo $this->Html->link('Mot de passe oublié ?', array('controller' => 'users', 'action' => 'forgetPassword')); ?>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="register-box">
        <h4>Pas encore de compte ?</h4>
        <p>Découvrez la première plateforme d'écriture collaborative</p>
        <?php echo $this->Html->link('S\'INSCRIRE <i class="glyphicon glyphicon-circle-arrow-right"></i>', array('action' => 'register'), array('class' => 'btn btn-shadow-blue', 'escape' => false)); ?>
      </div>
    </div>
  </div>
</section>
