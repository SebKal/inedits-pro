<?php echo $this->element('users/profil-cover') ?>
<section id="profile" class="container edit">
  <div class="row">
    <div class="col-xs-12 col-sm-3 profile-sidebar">
      <div class="profile-userpic">
        <?php
          echo $this->element(
            'users/avatar',
            array(
              'user'    => $user['User'],
              'width'   => 470,
              'height'  => 470,
              'class'   => 'img-responsive',
            )
          )
        ?>
      </div>
      <div class="actions-links">
        <?php echo $this->Html->link('Retour Profil', array('action' => 'profile', 'slug' => $user['User']['slug']), array('class' => 'btn btn-shadow-gray btn-block margin-top-20') ); ?>
      </div>
    </div>
    <div class="col-xs-12 col-sm-9 profile-content">
      <p class="user-name"><?php echo $user['User']['name'].' '.$user['User']['last_name']; ?></p>
      <div class="row">
        <div class="col-lg-12">
          <div class="portlet light user-bio">
            <div class="portlet-body">
            <p class="profile-title">Biographie</p>
              <?php
                echo $this->Form->create(
                  'User',
                  array(
                    'role'          => 'form',
                    'inputDefaults' => array(
                      'div'   => false,
                      'class' => 'form-control',
                      'label' => false)
                    )
                  );
              ?>
                <div class="form-group">
                        <?php echo $this->Form->input('bio', array('div' => '', 'type'=> 'textarea', 'placeholder' => 'Ce que vous faites dans la vie, textes publiés, manuscrits sous le coude, projets en cours...'));?>
                    </div>
                    <button class="btn blue-hoki" type="submit"> Modifier</button>
            </div>
          </div>
        </div>
      </div>
      <div class="portlet light bg-white">
        <div class="row margin-bottom-1">
            <div class="col-xs-6">
              <div class="portlet light">
                <div class="portlet-body">
                  <p class="profile-title">Vos auteurs préférés</p>
                  <?php
                    echo $this->Form->create(
                      'User',
                      array(
                        'role'          => 'form',
                        'inputDefaults' => array(
                          'div'   => false,
                          'class' => 'form-control',
                          'label' => false)
                        )
                      );
                  ?>
                    <div class="form-group">
                      <?php echo $this->Form->input('favorite_author', array('div' => '', 'placeholder' => 'Qui vous inspire ?'));?>
                    </div>
                </div>
              </div>
            </div>
          <div class="col-xs-6">
            <div class="portlet light">
              <div class="portlet-body">
              <p class="profile-title">Vos livres favoris</p>
                <div class="form-group">
                  <?php echo $this->Form->input('favorite_book', array('div' => '', 'placeholder' => 'Vos livres préférés'));?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="portlet light">
              <div class="portlet-body">
                <p class="profile-title">Votre inspiration du moment</p>
                <div class="form-group">
                  <?php echo $this->Form->input('inspiration', array('div' => '', 'placeholder' => 'Vos pensées du moment'));?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="portlet light">
              <div class="portlet-body">
                <p class="profile-title">Votre style d'écriture</p>
                <div class="form-group">
                  <?php echo $this->Form->input('style', array('div' => '', 'placeholder' => 'Quel est votre style d\'écriture ?'));?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
            <div class="portlet light">
              <div class="portlet-body">
                <p class="profile-title">Quel(s) genre(s) littéraires vous attire ?</p>
                <div class="form-group">
                  <?php echo $this->Form->input('genre', array('div' => '', 'placeholder' => 'Que lisez-vous ?'));?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="portlet light">
              <div class="portlet-body">
                <p class="profile-title">En quoi l'écriture collaborative vous motive-t-elle ?</p>
                <div class="form-group">
                  <?php echo $this->Form->input('social_writting', array('div' => '', 'placeholder' => 'Avez-vous déja participé à un projet similaire ?'));?>
                </div>
                <button class="btn blue-hoki" type="submit"> Modifier</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="portlet light">
            <div class="portlet-body">
              <div class="row">
                <div class="col-lg-12"><p class="profile-title">Informations Personnelles</p></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span>
                      <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Prénom'));?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-user"></i>
                      </span>
                      <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'Nom'));?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-envelope"></i>
                      </span>
                      <?php echo $this->Form->input('mail', array('class' => 'form-control', 'placeholder' => 'Email'));?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </span>
                      <?php echo $this->Form->input('facebook', array('class' => 'form-control', 'placeholder' => 'Votre compte facebook'));?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                      </span>
                      <?php echo $this->Form->input('twitter', array('class' => 'form-control', 'placeholder' => 'Votre compte twitter'));?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-link" aria-hidden="true"></i>
                      </span>
                      <?php echo $this->Form->input('website', array('class' => 'form-control', 'placeholder' => 'Votre site web'));?>
                    </div>
                  </div>
                  <div class="form-group">
                      <?php echo $this->Form->input('avatar_file', array('div' => '', 'type'=> 'file', 'label' => 'Avatar'));?>
                      <p class="help-block">Jpg, Png, Gif</p>
                  </div>
                  <div class="form-group">
                      <?php echo $this->Form->input('cover_file', array('div' => '', 'type'=> 'file', 'label' => 'Image de Couverture'));?>
                      <p class="help-block">Jpg, Png, Gif</p>
                  </div>
                </div>
                <div class="col-md-6">
                    <button class="btn blue-hoki" type="submit" id="haha">Modifier</button>
                </div>
              </div>
              <?php echo $this->Form->hidden('slug', array('value' => $user['User']['slug']));?>
              <?php echo $this->Form->end();?>
            </div>
          </div>
        </div>
        <div class="col-xs-12">
          <div class="portlet light">
            <div class="portlet-body">
              <p class="profile-title">Sécurité</p>
              <?php
                echo $this->Form->create(
                  'User',
                  array(
                    'role'          => 'form',
                    'inputDefaults' => array(
                      'div'   => false,
                      'class' => 'form-control',
                      'label' => false)
                    )
                  );
              ?>
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="fa fa-key"></i>
                              </span>
                              <?php echo $this->Form->input('old_pass', array('type' => 'password', 'placeholder' => 'Ancien mot de passe'));?>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="fa fa-key"></i>
                              </span>
                              <?php echo $this->Form->input('new_pass', array('type' => 'password', 'placeholder' => 'nouveau mot de passe'));?>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="fa fa-key"></i>
                              </span>
                              <?php echo $this->Form->input('new_pass_bis', array('type' => 'password', 'placeholder' => 'Retaper nouveau mot de pass'));?>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <button class="btn blue-hoki" type="submit"> Modifier</button>
                  </div>
                </div>
              <?php echo $this->Form->end();?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
