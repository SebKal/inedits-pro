<?php /*debug($navPrev);debug($navNext);*/ ?>
<div class="container-fluid contribution-wrapper">
	<div class="container contribution">
		<div class="row">
			<div class="col-sm-3 contrib-sidebar">
				
					<div class="contrib-avatar">
						<?php echo $this->Image->resize('default.jpg', 350, 350, array('class' => 'img-responsive')); ?>
					</div>
					<div class="contrib-user">
						<p>Contribution de</p>
						<h3><?php echo $tree['Tree']['author']; ?></h3>
						<?php echo $this->Html->link('Voir son site', array($tree['Tree']['author_link'], 'full_base' => false), array('class' => 'btn btn-block')); ?>
					</div>
					<div class="contrib-call">
						<h3>Cette histoire vous inspire ?</h3>
						<p>
							In&dits est le premier site d’écriture collaborative.
							Ecrivez enssemble 
							pour inventer les histoires 
							de demain et faites-vous éditer.
						</p>
						<?php echo $this->Html->link('Ecrivez la suite', array('controller' => 'contributions', 'action' => 'add', 'arbre' => $tree['Tree']['slug']), array('class' => 'btn btn-block')); ?>
					</div>
					<div class="contrib-meta">
						<ul class="list-unstyled">
							<li><b>Ajoutée le</b> : <?php echo date('d/m/Y', strtotime($tree['Tree']['created'])); ?></li>
							<li><b>Déjà lue</b> : 52 000 fois</li>
						</ul>
					</div>
				
			</div>
			<div class="col-sm-9 contrib-article">
				<div class="contrib-header">
					<h1><?php echo $tree['Tree']['title']; ?></h1>
					<div class="contrib-meta">
						<ul class="list-unstyled list-inline">
							<li>Arbre: <?php echo $this->Html->link($tree['Tree']['title'], array('controller' => 'trees', 'action' => 'view', 'slug' => $tree['Tree']['slug'])) ?><i class="fa fa-chevron-right"></i></li>
						</ul>
					</div>
				</div>
				<div class="contrib-actions clearfix">
					<!-- BEGIN NAV LINKS -->
					<?php /*if ($navPrev) echo $this->Html->link('<i class="fa fa-chevron-left"></i>Contribution Précédente', array('controller' => 'contributions', 'action' => 'view','title' => $tree['Tree']['slug'], 'slug' => $navPrev['Contribution']['slug']), array('class' => 'btn prev', 'escape' => false));*/ ?>
					
					<?php /*if ($navNext) echo $this->Html->link('Contribution Suivante<i class="fa fa-chevron-right"></i>', array('controller' => 'contributions', 'action' => 'view','title' => $contribution['Tree']['slug'], 'slug' => $navNext['Contribution']['slug']), array('class' => 'btn next', 'escape' => false));*/ ?>
				</div>
				<div class="portlet light">
					<div class="portlet-body contrib-content">
							<p><?php echo $tree['Tree']['content']; ?></p>
							<p>Fin</p>
					</div>
				</div>
				<div class="contrib-actions clearfix">
					<!-- BEGIN NAV LINKS -->
					<?php /*if ($navPrev) echo $this->Html->link('<i class="fa fa-chevron-left"></i>Contribution Précédente', array('controller' => 'contributions', 'action' => 'view','title' => $contribution['Tree']['slug'], 'slug' => $navPrev['Contribution']['slug']), array('class' => 'btn prev', 'escape' => false));*/ ?>
					
					<?php /*if ($navNext) echo $this->Html->link('Contribution Suivante<i class="fa fa-chevron-right"></i>', array('controller' => 'contributions', 'action' => 'view','title' => $contribution['Tree']['slug'], 'slug' => $navNext['Contribution']['slug']), array('class' => 'btn next', 'escape' => false));*/ ?>
				</div>
			</div>
		</div>
	</div>
</div>