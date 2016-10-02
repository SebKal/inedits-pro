<!DOCTYPE html>
<html lang="fr" >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    Inédits : <?php echo $this->fetch('title'); ?>
  </title>

  <meta name="description" content="<?php echo $this->fetch('description') ?>" />

  <?php echo $this->Html->meta('icon'); ?>

  <?php echo $this->element('global/css-front'); ?>
  <?php echo $this->element('global/js-front'); ?>

  <?php echo $this->fetch('css'); ?>
  <?php echo $this->fetch('script'); ?>

  <!-- <?php if ($currentUser): ?>
    <?php echo $this->Html->css(array('pro/'.$currentUser['Entreprise']['slug'].'/'.$currentUser['Entreprise']['slug'].'.css')) ?>
  <?php endif; ?> -->

  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic|Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600' rel='stylesheet' type='text/css
  '>
</head>
  <body class="<?php echo $bodyClass ? $bodyClass : ''; ?>">
    <header>

      <?php echo $this->element('nav/main'); ?>
      <?php echo $this->fetch('cover') ?>
      <?php echo $this->Session->flash(); ?>

      <!-- Custom Javascript triggered Alert -->
      <div class="alert alert-danger hide" id="alert-container">
        <span class="alert-content"></span>
        <button type="button" class="close" data-dismiss="alert">×</button>
      </div>
    </header>

      <?php if($bodyClass === 'trees-index') : ?>
        <div class="main-wrapper lazy <?php echo $bodyClass ? $bodyClass : ''; ?>" data-original="css/img/arbre.jpg" style="background: url('css/img/arbre.jpg') center -50px no-repeat #eee; background-size: 2564px 424px;">
      <?php else : ?>
        <div class="main-wrapper">
      <?php endif; ?>

      <?php echo $this->fetch('content'); ?>

      <?php if($currentUser) : ?>
        <?php echo $this->element('footer/main') ?>
      <?php endif; ?>
    </div>

    <div class="contact-modal-wrapper">
      <a id="contact-modal" data-toggle="modal" href="#contactModal" title="Nous contacter" alt="Contact Buton">Un problème, une erreur ?<i class="fa fa-info-circle"></i></a>
    </div>
    <?php echo $this->element('global/contact-modal'); ?>

  <!-- Load script in bottom -->
  <?php echo $this->fetch('scriptBottom'); ?>

  <!-- Google Analytics -->
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
