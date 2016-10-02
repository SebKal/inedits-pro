<!-- BEGIN CONTAINER -->
<div class="page-container">

  <?php echo $this->element('dashboard/dashboard-sidebar'); ?>

  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
          Les entrprises
      </h3>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box grey-cascade" id="usersPortlet">
            <div class="portlet-title">
              <div class="caption">
                Entrprises
              </div>
            </div>
            <div class="portlet-body">
              <div class="table-toolbar">
                <div class="row">
                  <div class="col-md-6">
                    <div class="btn-group">
                      <a data-toggle="modal" href="#addTree" class="btn blue-hoki">
                      Ajouter <i class="fa fa-plus"></i>
                      </a>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="btn-group pull-right">
                      <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                      </button>
                      <ul class="dropdown-menu pull-right">
                        <li>
                          <a href="javascript:;">
                          Save as PDF </a>
                        </li>
                        <li>
                          <a href="javascript:;">
                          Export to Excel </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover" id="sample_2">
                <thead>
                  <tr>
                    <th>
                      Nom
                    </th>
                    <th>
                      Admin
                    </th>
                    <th>
                      Outils
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($entreprises as $entreprise) : ?>
                    <tr class="odd gradeX">
                      <td>
                        <?php echo $entreprise['Entreprise']['name']; ?>
                      </td>
                      <td>
                        <?php echo $entreprise['User']['name']; ?>
                      </td>
                      <td>
                        <?php
                          echo $this->Html->link(
                            '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
                            array(
                              'controller' => 'entreprises',
                              'action' => 'edit',
                              $entreprise['Entreprise']['id'],
                              'admin' => true
                            ),
                            array(
                              'escape' => false
                            )
                          );
                        ?>
                        <?php
                          echo $this->Html->link(
                            '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
                            array(
                              'action' => 'delete',
                              $entreprise['Entreprise']['id'],
                              'admin' => true
                            ),
                            array(
                              'escape' => FALSE
                            ),
                            'Cette action est définitive, êtes vous sure de vouloir continuer ?'
                          );
                        ?>
                      </td>
                    </tr>
                  <?php  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->
        </div>
      </div>
      <!-- END PAGE CONTENT-->
    </div>
  </div>
  <!-- END CONTENT -->
</div>
<!-- END CONTAINER -->

<?php echo $this->element('Entreprises/add-modal'); ?>
