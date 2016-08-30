<!DOCTYPE html>
<html lang="fr" >
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		Inédit | <?php echo $this->fetch('title'); ?>
	</title>

	<?php
		echo $this->Html->meta('icon');

		//BEGIN GLOBAL MANDATORY STYLES
		echo $this->Html->css(array(
			'font-awesome.min',
			'metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min',
			'metronic/assets/global/plugins/bootstrap/css/bootstrap.min',
			'metronic/assets/global/plugins/uniform/css/uniform.default',
			'metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min'
		));

		//BEGIN PAGE LEVEL STYLES
		echo $this->Html->css(array(
			'metronic/assets/global/plugins/select2/select2',
			'metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap',
			'metronic/assets/global/plugins/bootstrap-summernote/summernote',
			'metronic/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch',
			'metronic/assets/global/plugins/bootstrap-modal/css/bootstrap-modal',
			'dashboard'
		));

		//BEGIN THEME STYLE
		echo $this->Html->css(array(
			'metronic/assets/global/css/components.css',
			'metronic/assets/global/css/plugins',
			'metronic/assets/admin/layout/css/layout',
			'metronic/assets/admin/layout/css/themes/darkblue',
			'metronic/assets/admin/layout/css/custom'
		));

		//BEGIN CORE PLUGINS
		echo $this->Html->script(array(
			'metronic/assets/global/plugins/jquery.min',
			'metronic/assets/global/plugins/jquery-migrate.min',
			'metronic/assets/global/plugins/jquery-ui/jquery-ui.min',
			'metronic/assets/global/plugins/bootstrap/js/bootstrap.min',
			'metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min',
			'metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min'			,
			'metronic/assets/global/plugins/jquery.blockui.min',
			'metronic/assets/global/plugins/jquery.cokie.min',
			'metronic/assets/global/plugins/uniform/jquery.uniform.min',
			'metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min'
			), array('block' => 'scriptBottom'));

		//BEGIN PAGE LEVEL PLUGINS
		echo $this->Html->script(array(
			'metronic/assets/global/plugins/select2/select2.min',
			'metronic/assets/global/plugins/datatables/media/js/jquery.dataTables.min',
			'metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap',
			'metronic/assets/global/plugins/bootstrap-summernote/summernote.min',
			'metronic/assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager',
			'metronic/assets/global/plugins/bootstrap-modal/js/bootstrap-modal'
			), array('block' => 'scriptBottom'));

		//BEGIN PAGE LEVEL SCRIPTS
		echo $this->Html->script(array(
			'metronic/assets/global/scripts/metronic',
			'metronic/assets/admin/layout/scripts/layout',
			'metronic/assets/admin/layout/scripts/quick-sidebar',
			'metronic/assets/admin/layout/scripts/demo',
			'metronic/assets/admin/pages/scripts/table-managed',
			'metronic/assets/admin/pages/scripts/components-editors',
			'metronic/assets/admin/pages/scripts/ui-extended-modals',

			'vendor/sneakscroll',
			'utils/classie',
			'dashboard'
			), array('block' => 'scriptBottom'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">

</head>
<body class="page-header-fixed page-quick-sidebar-over-content page-container-bg-solid">

	<?php echo $this->element('nav/dashboard-nav'); ?>

	<?php echo $this->Session->flash(); ?>


	<?php echo $this->fetch('content'); ?>

	<!-- Load script in bottom -->
	<?php echo $this->fetch('scriptBottom'); ?>

</body>
</html>
