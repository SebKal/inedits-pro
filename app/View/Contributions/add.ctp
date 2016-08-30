<!-- META -->
<?php $this->assign('title', 'Ajouter une contribution') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('contributions/add-cover');
  $this->end();
?>

<section class="container-fluid">
  <div class="container" id="registration">
    <div class="row">
      <?php echo $this->Form->create('Contribution', array('type'=>'file', 'url' => array('controller' => 'contributions', 'action' => 'add', 'arbre' => $tree['Tree']['slug'], 'contribution' => $parentContribution['Contribution']['id'], 'user' => $currentUser['id']), 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false) ));?>
        <div class="col-xs-12 col-sm-8 registration-wrapper">
          <div class="box">
            <h4>Vos informations personnelles <span class="bubble">1</span></h4>

            <div class="form-group">
              <?php echo $this->Form->input('name', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => 'Votre prénom', 'value' => $currentUser['name'])); ?>
            </div>
            <div class="form-group">
              <?php echo $this->Form->input('last_name', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => 'Votre nom', 'value' => $currentUser['last_name'])); ?>
            </div>
          </div>
          <div class="box">
            <h4>Votre Histoire <span class="bubble">2</span></h4>
            <div class="form-group">
              <?php echo $this->Form->input('title', array('class'=> 'form-control', 'div' => '', 'label' => '', 'placeholder' => 'Titre de la contribution')); ?>
            </div>
            <h4>Nous envoyer votre document</h4>
            <div class="letters-count hide">
              <span>Nombre de caractères : </span>
              <span class="letters-count-number"></span>
            </div>
            <div class="form-group custom-wyz">
              <i class="glyphicon glyphicon-user hide dismiss-textarea"></i>
              <?php echo $this->Form->input('content', array('label'=> '', 'class' => 'wysiwyg-input', 'novalidate' => 'novalidate'));?>
            </div>
            <div class="row text-actions">
              <div class="col-xs-12 col-sm-6">
                <div class="form-group custom-input-file">
                  <i class="glyphicon glyphicon-cloud-upload"></i>
                  <?php echo $this->Form->input('path_file', array('div' => '', 'type'=> 'file', 'label' => 'Envoyer un fichier<br/><small>(.doc, docx, .pdf, .txt)<br/>Recommandé</small>', 'class' => ''));?>
                  <div id="fakeFileName" class="clearfix well well-sm opaq">
                    <span></span>
                    <button id="resetAddContribForm" class="glyphicon glyphicon-remove pull-right" type="button"></button>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                <div class="custom-textarea-action">
                  <p><i class="glyphicon glyphicon-edit"></i>Ecrire en ligne<br/><small>En utilisant notre outil</small></p>
                </div>
              </div>
            </div>
          </div>
          <div class="box">
            <div class="row">
              <div class="col-sm-12">
                <h4>Conditions générales d'utilisation <span class="bubble">3</span></h4>
                <div class="charte">
                  <p>
                    Tous les textes proposés par les abonnés sont  soumis à validation par l’éditeur
                    avant leur publication en ligne. L’éditeur prendra en compte la qualité littéraire des
                    contenus proposés comme leur pertinence dans le suivi de l’arborescence.
                  </p>
                  <p>
                    Les contenus doivent  être conformes aux lois, ne pas être contraires aux bonnes
                    mœurs, à l'ordre public, aux réglementations en vigueur, et être libres de tout droit.
                    <br/>Seront donc refusés :
                  </p>
                  <ul>
                    <li>Les textes déjà soumis à un droit d’auteur.</li>

                    <li>les contenus contrevenant aux lois, à caractère diffamatoire, injurieux, </li>
                    obscène ou offensant ;

                    <li>la violence verbale ou faisant l'apologie du racisme et de la xénophobie, de </li>
                    l'homophobie, du révisionnisme ou du négationnisme ;

                    <li>les contenus à caractère pornographique ou pédophile ; </li>

                    <li>la divulgation d'informations permettant l'identification nominative et précise de </li>
                    toute personne privée telles que le nom de famille, l'adresse postale, l'adresse
                    électronique, le numéro de téléphone ; 

                    <li>le détournement du site pour faire de la propagande ou du prosélytisme à des </li>
                    fins professionnelles, commerciales, politiques, religieuses ou sectaires.
                  </ul>
                  <p>
                    Chaque contribution devra porter un titre qui l’identifie.
                    Les  participants recevront  un mail les informant de la décision  de l’éditeur
                    concernant leurs contributions. Trois réponses seront possibles : refusé, accepté, à
                    corriger (dans ce cas les éléments à modifier seront précisés)
                    Notre site  offre une vitrine de qualité aux auteurs, en conséquence l’auteur ne
                    pourra se prévaloir de droits d’auteurs pour ses contributions en ligne. En revanche,
                    si l’éditeur décide de publier une histoire aboutie sous la forme d’un recueil collectif
                    ou individuel, imprimé et /ou numérique,  un contrat à compte d’éditeur standard (sur
                    le modèle de celui que recommande la SGDL) sera conclu entre les différentes
                    parties.
                  </p>
                </div>
                <div class="form-group">
                  <?php echo $this->Form->input('conditions', array('class'=> 'form-control', 'id' => 'check-charte', 'type' => 'checkbox', 'label' => 'j\'ai lu et j\'accepte les conditions générales d\'utilisation')); ?>
                </div>
                <button class="btn btn-shadow-yellow register-btn" disabled>Envoyer</button>
              </div>
              <span class="last-bubble">></span>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1 info-participer">
          <p class="icon-wrapper"><i class="glyphicon glyphicon-info-sign"></i></p>
          <p class="warn">Important</p>
          <p>
            - Toutes les contributions sont validées par notre équipe.
          </p>
          <p>
            - Vous reconnaissez être l'auteur original du texte que vous souhaitez ajouter.
          </p>
          <p>
            - La taille minimale d'une contribution est de 3000 caractères et la taille maximale, 7000.
          </p>
        </div>
      <?php echo $this->Form->end();?>
    </div>
  </div>
</section>
