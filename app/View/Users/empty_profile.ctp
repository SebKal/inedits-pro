<?php /*debug($trees);*/ ?>
<div class="profil-cover">
    <?php if (!empty($user['User']['cover'])) : ?>
        <?php echo $this->Image->resize($user['User']['cover'], 1920, 270, array('class' => 'img-responsive')); ?>
    <?php else : ?>
        <?php echo $this->Html->image('default.jpg', array('class' => 'img-responsive')); ?>
    <?php endif; ?>
    <div class="shadow"></div>
</div>
<div id="profile" class="container">
    <div class="row">
        <div class="col-xs-6 col-sm-3 profile-sidebar">
            <div class="profile-userpic">
                <?php if (!empty($user['User']['avatar'])) : ?>
                    <?php echo $this->Image->resize($user['User']['avatar'] , 470, 470, array('class' => 'img-responsive')); ?>
                <?php else : ?>
                    <?php echo $this->Image->resize('default.jpg', 470, 470, array('class' => 'img-responsive')); ?>
                <?php endif; ?>
            </div>
            <div class="actions-links">
                <?php if($currentUser && $currentUser['id'] == $user['User']['id'] || $currentUser['role_id'] == 1) : ?>    
                    <?php echo $this->Html->link('Modifier mon Profil', array('action' => 'edit', 'slug' => $user['User']['slug']), array('class' => 'btn btn-shadow-gray btn-block margin-top-20') ); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-sm-9 profile-content">
            <p class="user-name"><?php echo $user['User']['name'].' '.$user['User']['last_name']; ?></p>
            
            <div class="portlet light user-empty">
                <div class="portlet-body">
                    <p class="profile-title">Merci de votre inscription sur Inédits !</p>
                    <p>
                        Merci de votre inscription sur Inédits :)<br>
                        Nous comptons sur vous pour le compléter et devenir un membre actif de notre communauté
                    </p>
                    <?php echo $this->Html->link('Modifier mon profil', array('action' => 'edit', 'slug' => $user['User']['slug']), array('class' => 'btn btn-shadow-yellow')) ?>
                </div>
            </div>
            <p>N'hésitez pas à découvrir <?php echo $this->Html->link('les arbres', array('controller' => 'trees', 'action' => 'index')); ?> et participer sur un projet d'écriture collaborative !</p>
        </div>
    </div>
</div>