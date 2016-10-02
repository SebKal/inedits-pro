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
    </div>
    <div class="col-xs-12 col-sm-9 profile-content">
      <p class="user-name"><?php echo $user['User']['name'].' '.$user['User']['last_name']; ?></p>
      <div class="row">
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
