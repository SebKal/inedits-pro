<!-- BEGIN CONTAINER -->
<div class="page-container">

  <?php if ($currentUser['role_id'] == 1): ?>
    <?php echo $this->element('dashboard/dashboard-sidebar'); ?>
  <?php elseif ($currentUser['role_id'] == 4): ?>
    <?php echo $this->element('dashboard/dashboard-sidebar'); ?>
  <?php endif; ?>

  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN PAGE HEADER-->
      <h3 class="page-title">
          Les arbres
      </h3>
      <!-- END PAGE HEADER-->
      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box grey-cascade" id="usersPortlet">
            <div class="portlet-title">
              <div class="caption">
                Arbres
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
                          <?php echo $this->Html->link('Delete', array('controller' => 'users', 'action' => 'suspendSelected'), array('class' => 'usersDelete')); ?>
                        </li>
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
                      Titre
                    </th>
                    <th>
                      Entreprise
                    </th>
                    <th>
                      Contributions
                    </th>
                    <th>
                      Crée le
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Outils
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($trees as $tree) : ?>
                    <tr class="odd gradeX">
                      <td>
                        <?php echo $tree['Tree']['title']; ?>
                      </td>

                        <?php echo $tree['Entreprise']['name']; ?>
                      </td>
                      <td>
                        <?php echo $tree['Tree']['contribution_count']; ?> </a>
                      </td>
                      <td>
                        <span class="hide"><?php echo date('Y-m-d H:i' ,strtotime($tree['Tree']['created'])); ?></span>
                        <?php echo date('d-m-Y H:i' ,strtotime($tree['Tree']['created'])); ?>
                      </td>
                      <td>
                        <?php if ($tree['Tree']['status'] == 1) : ?>
                          <span>
                            <?php echo $this->Html->link('<i class="fa fa-check"></i>', array('controller' => 'trees', 'action' => 'approve', $tree['Tree']['id']), array('class' => 'btn btn-xs blue-hoki', 'escape' => false)); ?>
                            <?php echo $this->Html->link('<i class="fa fa-times"></i>', array('controller' => 'trees', 'action' => 'suspend', $tree['Tree']['id']), array('class' => 'btn btn-xs red', 'escape' => false)); ?>
                          </span>
                        <?php elseif ($tree['Tree']['status'] == 2) : ?>
                          <span class="label label-sm label-danger">Suspendu</span>
                          <span><?php echo $this->Html->link('<i class="fa fa-check"></i>', array('controller' => 'trees', 'action' => 'approve', $tree['Tree']['id']), array('class' => 'btn btn-xs blue-hoki', 'escape' => false)); ?></span>
                        <?php elseif ($tree['Tree']['status'] == 3) : ?>
                          <span class="label label-sm label-success">Approuvé</span>
                          <span>
                            <?php echo $this->Html->link('<i class="fa fa-times"></i>', array('controller' => 'trees', 'action' => 'suspend', $tree['Tree']['id']), array('class' => 'btn btn-xs red', 'escape' => false)); ?>
                          </span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php
                          echo $this->Html->link(
                            '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
                            array(
                              'controller' => 'trees',
                              'action' => 'edit',
                              $tree['Tree']['id'],
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
                              $tree['Tree']['id'],
                              'admin' => true
                            ),
                            array(
                              'escape' => FALSE
                            ),
                            'Cette action est définitive, êtes vous sure de vouloir continuer ?'
                          );
                        ?>
                        <?php
                          echo $this->Html->link(
                            '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>',
                            array(
                              'controller' => 'trees',
                              'action' => 'view',
                              $tree['Tree']['slug'],
                              'admin' => false
                            ),
                            array('escape' => FALSE)
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

<?php echo $this->element('trees/add-modal'); ?>
