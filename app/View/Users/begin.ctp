<div class="container">
  <?php echo $this->Form->create([], array('url' => array('controller' => 'users', 'action' => 'begin'))) ?>
    <?php echo $this->Form->input('access_token', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => '')); ?>
    <button type="submit" class="btn btn-primary">Valider</button>
  <?php echo $this->Form->end() ?>
</div>
