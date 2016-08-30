<!-- BEGIN CONTAINER -->
<div class="page-container">

    <?php echo $this->element('dashboard/dashboard-sidebar'); ?>

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Gestion des utilisateurs
            </h3>
            <!-- <div class="page-bar">
                <div class="page-toolbar">
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                        Actions <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li>
                                <a href="#">Action</a>
                            </li>
                            <li>
                                <a href="#">Another action</a>
                            </li>
                            <li>
                                <a href="#">Something else here</a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="#">Separated link</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box grey-cascade" id="usersPortlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user"></i>Utilisateurs
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <!-- <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn green">
                                            Ajouter <i class="fa fa-plus"></i>
                                            </button>
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
                                    </div> -->
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <!-- <th class="table-checkbox">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
                                </th> -->
                                <th>
                                     Nom
                                </th>
                                <th>
                                     Prénom
                                </th>
                                <th>
                                     Mail
                                </th>
                                <th>
                                    Inscrit le
                                </th>
                                <th>
                                     Rôle
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
                                <?php foreach ($users as $user) : ?>
                                    <tr class="odd gradeX">
                                        <!-- <td>
                                            <input type="checkbox" class="checkboxes" value="<?php echo $user['User']['id']; ?>"/>
                                        </td> -->
                                        <td>
                                            <?php echo $user['User']['last_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['User']['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $user['User']['mail']; ?>
                                        </td>
                                        <td>
                                            <span class="hide"><?php echo date('Y-m-d H:i' ,strtotime($user['User']['created'])); ?></span>
                                            <?php echo date('d-m-Y H:i' ,strtotime($user['User']['created'])); ?>
                                        </td>
                                        <td class="center">
                                             <?php echo $user['Role']['title']; ?>
                                        </td>
                                        <td>
                                            <?php if ($user['User']['status'] == 1) : ?>
                                                <span>
                                                    <?php
                                                        echo $this->Html->link('
                                                            <i class="fa fa-check"></i>',
                                                            array(
                                                                'controller' => 'users',
                                                                'action' => 'approve',
                                                                $user['User']['id']
                                                            ),
                                                            array(
                                                                'class' => 'btn btn-xs blue-hoki',
                                                                'escape' => false
                                                            )
                                                        );

                                                    ?>
                                                    <?php
                                                        echo $this->Html->link(
                                                            '<i class="fa fa-times"></i>',
                                                            array(
                                                                'controller' => 'users',
                                                                'action' => 'suspend',
                                                                $user['User']['id']
                                                            ),
                                                            array(
                                                                'class' => 'btn btn-xs red',
                                                                'escape' => false
                                                            )
                                                        );
                                                    ?>
                                                </span>
                                            <?php elseif ($user['User']['status'] == 2) : ?>
                                                <span class="label label-sm label-danger">Suspendu</span>
                                                <span>
                                                    <?php
                                                        echo $this->Html->link(
                                                            '<i class="fa fa-check"></i>',
                                                            array(
                                                                'controller' => 'users',
                                                                'action' => 'approve',
                                                                $user['User']['id']
                                                            ),
                                                            array('class' => 'btn btn-xs blue-hoki',
                                                                'escape' => false
                                                            )
                                                        );
                                                    ?>
                                                </span>
                                            <?php elseif ($user['User']['status'] == 3) : ?>
                                                <span class="label label-sm label-success">Approuvé</span>
                                                <span>
                                                    <?php
                                                        echo $this->Html->link(
                                                            '<i class="fa fa-times"></i>',
                                                            array('controller' => 'users',
                                                                'action' => 'suspend',
                                                                $user['User']['id']
                                                            ),
                                                            array(
                                                                'class' => 'btn btn-xs red',
                                                                'escape' => false
                                                            )
                                                        );
                                                    ?>
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php
                                                echo $this->Html->link(
                                                    '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
                                                    array(
                                                        'controller' => 'users',
                                                        'action' => 'edit',
                                                        $user['User']['id']
                                                    ),
                                                    array(
                                                        'escape' => FALSE
                                                    )
                                                );
                                            ?>
                                            <?php
                                                echo $this->Html->link(
                                                    '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
                                                    array(
                                                        'action' => 'delete',
                                                        $user['User']['id'],
                                                        'admin' => false
                                                    ),
                                                    array(
                                                        'escape' => FALSE
                                                    ),
                                                    'Cette action est définitive, êtes vous sure de vouloir continuer ?'
                                                );
                                            ?>
                                            <?php
                                                echo $this->Html->link(
                                                    '<span class="glyphicon glyphicon-user" aria-hidden="true"></span>',
                                                    array('controller' => 'users',
                                                        'action' => 'profile',
                                                        $user['User']['slug'],
                                                        'admin' => false), array('escape' => FALSE
                                                    )
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
