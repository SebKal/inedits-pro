<!-- META -->
<?php $this->assign('title', 'Créez votre compte') ?>
<?php $this->assign('description', 'Créez un compte sur le premier réseau social d\'écriture littéraire collaborative') ?>

<!-- VIEW BLOCKS -->
<?php
  $this->start('cover');
    echo $this->element('global/page-cover', array('title' => 'S\'inscrire'));
  $this->end();
?>

<section class="container" id="registration">
    <div class="row">
        <?php echo $this->Form->create('User', array('type'=>'file', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false)));?>
            <div class="col-sm-12 col-md-12 registration-wrapper">
                <div class="box">
                    <h4>Vos informations personnelles * <span class="bubble">1</span></h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('name', array('class'=> 'form-control', 'div' => '', 'placeholder' => 'Votre prénom'));?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('last_name', array('class'=> 'form-control', 'div' => '', 'placeholder' => 'Votre nom'));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <h4>Votre compte In&dits <span class="bubble">2</span></h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('mail', array('class'=> 'form-control', 'div' => '', 'placeholder' => 'Votre adresse Email'));?>
                            </div>
                        </div>
                    </div>
                   	<div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('password', array('class'=> 'form-control', 'div' => '', 'placeholder' => 'Votre mot de passe'));?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('password_confirm', array('type' => 'password', 'class'=> 'form-control', 'div' => '', 'placeholder' => 'Confirmer le mot de passe'));?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <?php echo $this->Form->input('entreprise_id', array('class'=> 'form-control', 'div' => '', 'label' => 'Entreprise'));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <h4>Votre Profil <span class="bubble">3</span></h4>
                    <div class="row">
                        <div class="col-sm-12">
                                <div class="cadre">
                                    <div class="avatar-preview-frame">
                                        <img src="https://placehold.it/300x300" class="avatar-preview">
                                    </div>
                                </div>
                                <div class="form-group preview">
                                    <?php echo $this->Form->input('avatar_file', array('div' => '', 'type'=> 'file', 'label' => 'Avatar', 'class' => 'avatar-preview-input', 'value' => 'Parcourir'));?>
                                    <p class="help-block">Jpg, Png, Gif</p>
                                </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="cadre">
                                <div class="cover-preview-frame">
                                    <img src="https://placehold.it/1000x270" class="cover-preview">
                                </div>
                            </div>
                            <div class="form-group preview">
                                <?php echo $this->Form->input('cover_file', array('div' => '', 'type'=> 'file', 'label' => 'Image de couverture', 'class' => 'cover-preview-input'));?>
                                <p class="help-block">Jpg, Png, Gif</p>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <h4>Conditions générales d'utilisation <span class="bubble">4</span></h4>
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
                            <button class="btn btn-shadow-yellow register-btn" disabled>S'inscrire</button>
                        </div>
                        <span class="last-bubble">></span>
                    </div>
                </div>
            </div>

        <?php echo $this->Form->end();?>
    </div>
</section>
