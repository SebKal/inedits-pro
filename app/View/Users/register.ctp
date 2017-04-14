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
                            <button class="btn btn-shadow-yellow register-btn" disabled>S'inscrire</button>
                        </div>
                        <span class="last-bubble">></span>
                    </div>
                </div>
            </div>

        <?php echo $this->Form->end();?>
    </div>
</section>
