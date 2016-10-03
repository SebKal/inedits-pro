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
        <?php echo $tree['Tree']['title']; ?>
      </h1>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-lg-12 profile-content">
          <div class="row">
            <div class="col-sm-3">
              <div class="row">
                <div class="col-sm-12">
                  <div class="portlet light">
                    <div class="portlet-body">
                      <?php
                        echo $this->Html->link('Voir l\'arbre', array(
                            'controller' => 'trees',
                            'action' => 'view',
                            $tree['Tree']['slug'],
                            'admin' => false
                          ),
                          array('class' => 'btn btn-block btn-primary')
                        );
                      ?>
                      <a data-toggle="modal" href="#addContribution" class="btn btn-block btn-primary">
                      Ajouter <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
                <div class="portlet light">
                  <div class="portlet-title">
                    <div class="caption">
                      <span class="caption-subject bold uppercase">Fin ?</span>
                    </div>
                  </div>
                  <div class="portlet-body">
                    <?php echo $this->Form->create('Tree', array('role' => 'form', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))); ?>
                      <?php echo $this->Form->input('is_end', array('checked'=> $tree['Tree']['is_end']));?>
                      <button class="btn btn-block blue-hoki margin-top-10" type="submit">Modifier</button>
                    <?php echo $this->Form->end();?>
                  </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-9">
              <div class="row">
                <div class="col-sm-12">
                  <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase">Titre</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                      <?php echo $this->Form->create('Tree', array('role' => 'form', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))); ?>

                        <div class="form-group">
                            <?php echo $this->Form->input('title', array('value'=> $tree['Tree']['title'] ));?>
                        </div>
                        <button class="btn btn-block blue-hoki margin-top-10" type="submit">Modifier</button>
                      <?php echo $this->Form->end();?>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="portlet light">
                    <div class="portlet-title">
                      <div class="caption">
                        <span class="caption-subject bold uppercase">Contenu</span>
                      </div>
                    </div>
                    <div class="portlet-body">
                      <?php echo $this->Form->create('Tree', array('role' => 'form', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))); ?>
                        <?php echo $this->Form->input('content', array('value'=> $tree['Tree']['content'], 'class' => 'wysiwyg-input'));?>
                        <button class="btn btn-block blue-hoki margin-top-10" type="submit">Modifier</button>
                      <?php echo $this->Form->end();?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END PAGE CONTENT-->
    </div>
  </div>
  <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<!-- START MODALS -->
<?php echo $this->element('contributions/add-modal'); ?>
<!-- END MODALS -->
