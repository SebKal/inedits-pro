<?php $this->assign('title', $tree['Tree']['title']) ?>
<?php $this->assign('description', 'Découvrez '.$tree['Tree']['title'].', sur le réseau social d\'écriture Inédits.') ?>

<div class="container-fluid tree-intro-wrapper">
	<?php foreach ($contributions as $contrib) : ?>
			<div class="child-bubble" id="<?php echo $contrib['Contribution']['slug'] ?>">
				<p class="bubble-sub-title">Écrit par : <?php echo $this->Html->link($contrib['User']['name'].' '.$contrib['User']['last_name'], array('controller' => 'users', 'action' => 'profile', 'slug' => $contrib['User']['slug'])) ?></p>
					<?php echo $this->Image->resize($contrib['User']['avatar'] , 50, 50, array('class' => 'img-circle img-absolute')); ?>
				<p class="bubble-title"><?php echo $contrib['Contribution']['title']; ?></p>
				<p class="bubble-sub-title">Extrait</p>
				<p>
				<?php echo $this->Text->truncate($contrib['Contribution']['content'], 400, array('ellipsis' => '...', 'exact' =>false)); ?>
				</p>
				<?php echo $this->Html->link('voir', array('controller' => 'contributions', 'action' => 'view', 'slug' => $contrib['Contribution']['slug'], 'title' => $tree['Tree']['slug']), array('id' => 'getTreeLink')) ?>
			</div>
		<?php endforeach; ?>
	<div class="container tree-intro margin-bottom-25">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				<h1><?php echo $tree['Tree']['title']; ?></h1>
				<div class="tree-prez">
					<span><b><?php echo $tree['Tree']['contribution_count'] ?> </b>Contributions</span>
					<span>Démarré le : <?php echo strftime('%d / %m / %Y', strtotime($tree['Tree']['created'])); ?></span>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 center">
				<?php echo $this->Html->link('Comment ajouter ma contribution ?', array('controller' => 'pages', 'action' => 'comment_ca_marche'), array('class' => 'btn btn-tree-tittle')); ?>
			</div>
		</div>
	</div>
</div>

<!-- DIV FOR THE TREE -->
<div class="container-fluid tree-container" id="draggable">

</div>
