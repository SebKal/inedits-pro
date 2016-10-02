<!-- BEGIN CONTAINER -->
<div class="page-container">
  <?php echo $this->element('dashboard/dashboard-sidebar'); ?>
  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h1 class="page-title">
        <?php echo $entreprise['Entreprise']['name']; ?>
      </h1>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-lg-12 profile-content">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-9">
              <div class="row">
                <div class="col-sm-6">
                  <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase">Nom</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                      <?php echo $this->Form->create('Entreprise', array('role' => 'form', 'inputDefaults' => array('div' => false, 'class' => 'form-control', 'label' => false))); ?>

                        <div class="form-group">
                            <?php echo $this->Form->input('name', array('value'=> $entreprise['Entreprise']['name'] ));?>
                        </div>
                        <button class="btn btn-block blue-hoki margin-top-10" type="submit">Modifier</button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <span class="caption-subject bold uppercase">Admin</span>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="form-group">
                            <?php echo $this->Form->input('user_id', array('value'=> $entreprise['User']['id'] ));?>
                        </div>
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
