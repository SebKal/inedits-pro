<div class="col-xs-6 col-sm-9 profile-content">
    <p class="user-name"><?php echo $user['User']['name'].' '.$user['User']['last_name']; ?></p>

    <div class="portlet light user-empty">
        <div class="portlet-body">
        <p class="profile-title">Ce profil n'est pas rempli à 100%</p>
        <p>
            Ce profil vient d'être créé et n'est pas encore renseigné.<br/>
            Revenez plus tard pour voir les mise à jour.
        </p>
        </div>
    </div>

    <p class="recall">N'hésitez pas à découvrir <?php echo $this->Html->link('les arbres', array('controller' => 'trees', 'action' => 'index')); ?> et participer sur un projet d'écriture collaborative !</p>
</div>
