<!-- BEGIN CONTAINER -->
<div class="page-container">
<?php if ($currentUser['role_id'] == 1): ?>
  <?php echo $this->element('dashboard/dashboard-sidebar'); ?>
<?php elseif ($currentUser['role_id'] == 4): ?>
  <?php echo $this->element('dashboard/anime-sidebar'); ?>
<?php endif; ?>
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h1 class="page-title">
        <?php echo $contribution['Contribution']['title']; ?>
      </h1>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-lg-3">
          <?php
            echo $contribution['User']['avatar'] ?
            $this->Image->resize($contribution['User']['avatar'], 350, 350, array('class' => 'img-responsive')) :
            $this->Image->resize('default.jpg', 500, 500, array('class' => 'img-responsive'));
          ?>
          <div class="portlet light">
            <div class="portlet-body">
              <h4><?php echo $contribution['User']['name'].' '.$contribution['User']['last_name']; ?></h4>
              <div class="row">
                <div class="col-sm-12">
                  <?php echo $this->Form->create('Contribution', array('url' => array('controller' => 'contributions', 'action' => 'suspend', $contribution['Contribution']['id']), 'role' => 'form', 'class' => 'wysiwyg-submit', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))) ?>
                    <div class="form-group">
                      <label for="comment">Message personnalisé :</label>
                      <textarea class="form-control" rows="5" id="comment" name="deny_contrib_mail"></textarea>
                    </div>
                    <!-- Accept Deny Btn -->
                    <?php if($contribution['Contribution']['status'] == 1) : ?>
                      <?php echo $this->Html->link('Approuver', array('controller' => 'contributions', 'action' => 'approve', $contribution['Contribution']['id']), array('class' => 'btn btn-block green-haze', 'type' => 'submit')) ?>
                      <button type="submit" class="btn btn-block red" >Refuser</button>
                    <?php elseif($contribution['Contribution']['status'] == 3) : ?>
                      <button type="submit" class="btn btn-block red" >Refuser</button>
                    <?php elseif($contribution['Contribution']['status'] == 2) : ?>
                      <?php echo $this->Html->link('Approuver', array('controller' => 'contributions', 'action' => 'approve', $contribution['Contribution']['id']), array('class' => 'btn btn-block green-haze', 'type' => 'submit')) ?>
                    <?php endif; ?>
                  <?php echo $this->Form->end() ?>
                </div>
                <?php if (!empty($contribution['Contribution']['path'])) : ?>
                  <div class="col-sm-12">
                    <?php echo $this->Html->link('Download', array('controller' => 'contributions', 'action' => 'sendFile', $contribution['Contribution']['slug'], 'admin' => false), array('escape' => false, 'class' => 'btn btn-block blue-hoki margin-top-10')); ?>
                    </div>
                <?php endif;  ?>
                <div class="col-sm-12">
                  <?php echo $this->Html->link('Voir l\'arbre', array('controller' => 'trees', 'action' => 'view', 'slug' => $contribution['Tree']['slug'], 'admin' => false), array('escape' => false, 'class' => 'btn btn-block blue-hoki margin-top-10')); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-9">
          <?php echo $this->Form->create('Contribution', array('role' => 'form', 'type' => 'file', 'class' => 'wysiwyg-submit', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))) ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="portlet light">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="icon-cursor font-purple-intense hide"></i>
                    <span class="caption-subject bold uppercase">Titre</span>
                  </div>
                </div>
                <div class="portlet-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('title', array('value'=> $contribution['Contribution']['title'])) ?>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-cursor font-purple-intense hide"></i>
                        <span class="caption-subject bold uppercase">Contenu</span>
                    </div>
                </div>
                <div class="portlet-body">
                  <?php echo $this->Form->input('content', array('class' => 'wysiwyg-input', 'value'=> $contribution['Contribution']['content']));?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <div class="portlet light">
                <div class="portlet-title">
                  <div class="caption">
                    <span class="caption-subject bold uppercase">Principal</span>
                  </div>
                </div>
                <div class="portlet-body">
                  <?php echo $this->Form->input('Contribution.isMain', array('checked' => $contribution['Contribution']['isMain']));?>
                </div>
              </div>
            </div>
          </div>
          <?php echo $this->Form->hidden('slug', array('value' => $contribution['Contribution']['slug']));?>
          <button class="btn btn-block blue-hoki margin-top-10" type="submit">Modifier</button>
          <?php echo $this->Form->end();?>
        </div>
      </div>
      <!-- END PAGE CONTENT-->
    </div>
  </div>
  <!-- END CONTENT -->
  <!-- BEGIN QUICK SIDEBAR -->
  <a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
</div>
<!-- END CONTAINER -->
