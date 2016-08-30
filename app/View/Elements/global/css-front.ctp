<?php
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
    'metronic/assets/global/plugins/bootstrap-summernote/summernote',
    'metronic/assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch',
    'metronic/assets/global/plugins/bootstrap-modal/css/bootstrap-modal'
  ));

  //BEGIN THEME STYLE
  echo $this->Html->css(array(
    'metronic/assets/global/css/components-rounded.css',
    'metronic/assets/global/css/plugins',
    'metronic/assets/admin/layout/css/layout',
    'metronic/assets/admin/layout/css/custom'
  ));

  echo $this->Html->css(array(
    'main',
    ));
?>
