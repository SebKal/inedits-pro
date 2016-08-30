<div class="container">
  <div class="access-box">
    <div class="access-box-content">
      <h1 class="featurette-heading">Inédits Pro</h1>
      <p>
        La version pro de Inédits est en accès restreint, veuillez saisir votre code d'entrée :
      </p>
      <?php echo $this->Form->create([], array('url' => array('controller' => 'users', 'action' => 'begin'))) ?>
        <?php echo $this->Form->input('access_token', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => '')); ?>
        <button class="btn btn-shadow-blue" type="submit">Se connecter</button>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
