<div class="container valid-register">
	<h3>Merci de votre participation !</h3>
	<p>
		Votre contribution sera étudiée par notre équipe. Vous recevrez un email pour vous informer de la suite qui sera donnée.
	</p>
	<p>
		<br/>
		<?php echo $this->Html->link('Retour à l\'arbre', array('controller' => 'trees', 'action' => 'view', 'slug' => $tree['Tree']['slug']), array('class' => 'btn btn-shadow-gray')) ?>
	</p>
</div>
