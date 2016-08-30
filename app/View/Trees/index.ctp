<?php $this->assign('title', 'Les arbres en cours d’écriture') ?>
<?php $this->assign('description', 'Notre concept d\'écriture collaborative est original et novateur. Découvrez nos arbres et participez à l\'aventure !') ?>

<section class="container trees">
	<h1>Les arbres</h1>
	<div class="row">
		    <?php foreach ($trees as $tree) : ?>
		    	<?php echo $this->element('trees/index', array('tree' => $tree)); ?>
			<?php endforeach; ?>
	</div>
</div>
