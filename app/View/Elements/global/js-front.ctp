<?php
  //BEGIN CORE PLUGINS
  echo $this->Html->script(array(
    'metronic/assets/global/plugins/jquery.min',
    'metronic/assets/global/plugins/jquery-migrate.min',
    'metronic/assets/global/plugins/jquery-ui/jquery-ui.min',
    'metronic/assets/global/plugins/jquery-ui/jquery.ui.touch-punch.min',
    'metronic/assets/global/plugins/jquery-ui/jquery.panzoom.min',
    'metronic/assets/global/plugins/bootstrap/js/bootstrap.min',
    'metronic/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min',
    'metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min'      ,
    'metronic/assets/global/plugins/jquery.blockui.min',
    'metronic/assets/global/plugins/jquery.cokie.min',
    'metronic/assets/global/plugins/uniform/jquery.uniform.min',
    'metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min'
    ), array('block' => 'scriptBottom'));

  //BEGIN PAGE LEVEL PLUGINS
  echo $this->Html->script(array(
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
    'metronic/assets/admin/pages/scripts/components-editors',
    'metronic/assets/admin/pages/scripts/ui-extended-modals',

    'vendor/sneakscroll',
    'vendor/jquery.lazyload',
    'utils/classie',
    'main'
    ), array('block' => 'scriptBottom'));
?>
