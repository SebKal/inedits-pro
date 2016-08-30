<!DOCTYPE html>
<html lang="fr" >
<head>
  <?php echo $this->Html->charset(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    Inédit | <?php echo $this->fetch('title'); ?>
  </title>
  <?php
    echo $this->Html->meta('icon');

    //BEGIN GLOBAL MANDATORY STYLES
    echo $this->Html->css(array(
      'metronic/assets/global/plugins/font-awesome/css/font-awesome.min',
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
      'cooltree/cooltree',
      'main',
      ));

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
      'vendor/cooltree/cooltree',
      'vendor/d3/d3.min',
      'vendor/d3/d3-tip',
      'vendor/jquery.lazyload',
      'utils/classie',
      'main'
      ), array('block' => 'scriptBottom'));

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>

  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic|Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css'>

</head>
<body class="<?php echo $bodyClass ? $bodyClass : ''; ?>">
    <header>
      <?php echo $this->element('nav/main'); ?>

      <?php

        // Search header
        if ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'index') echo $this->element('headers/search');

        // Login header
        if ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'login') echo $this->element('headers/login');

        // Register header
        if ($this->request->params['controller'] == 'users' && $this->request->params['action'] == 'register') echo $this->element('headers/register');

        // Home header
        if ($this->request->params['controller'] == 'contributions' && $this->request->params['action'] == 'index') echo $this->element('headers/home');

        // How it works header
        if ($this->request->url == 'pages/comment_ca_marche') echo $this->element('headers/how');

        // Add Contrib header
        if ($this->request->action == 'add' && $this->request->controller == 'contributions') echo $this->element('headers/contrib_add');
      ?>

      <?php echo $this->Session->flash(); ?>
    </header>

    <div class="main-wrapper lazy <?php echo $bodyClass ? $bodyClass : ''; ?>" data-original="../css/img/tree_bg.jpg" style="background: url('../css/img/tree_bg.jpg') center center no-repeat; background-size: cover;">

      <?php echo $this->fetch('content'); ?>

      <footer>
        <?php if($this->request->params['controller'] == 'trees' && $this->request->params['action'] == 'view') : ?>
        <?php else : ?>
          <?php echo $this->element('footer/main'); ?>
        <?php endif; ?>
      </footer>

    </div>

  <!-- Load script in bottom -->
  <?php echo $this->fetch('scriptBottom'); ?>

  <script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

   ga('create', 'UA-76538549-1', 'auto');
   ga('send', 'pageview');

  </script>

</body>
</html>
