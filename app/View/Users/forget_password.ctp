<div class="container valid-register">
	<h3>Votre adresse email</h3>
	
	<?php echo $this->Form->create('User', array( 'url' => array('action' => 'forgetPassword'), 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))); ?>
	
		<div class="form-group">
			<?php echo $this->Form->input('mail', array('type' => 'email', 'placeholder' => 'Votre adresse email')); ?>
		</div>

		<div class="form-group">
			<button class="btn blue-hoki">Valider</button>
		</div>

	<?php echo $this->Form->end(); ?>
</div>