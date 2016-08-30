<?php /*debug($authors);*/ ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <li class="sidebar-toggler-wrapper" style="margin-bottom: 1em;">
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <div class="sidebar-toggler">
                    </div>
                    <!-- END SIDEBAR TOGGLER BUTTON -->
                </li>
                <li class="active open">
                    <a href="javascript:;">
                    <i class="icon-briefcase"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <?php echo $this->Html->link('Utilisateurs', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?>
                        </li>
                        <li class="active">
                            <?php echo $this->Html->link('Contributions', array('controller' => 'contributions', 'action' => 'index', 'admin' => true)); ?>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h1 class="page-title">
            </h1>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-sm-3">
						<div class="portlet light">
							<div class="portlet-body">
								<ul class="list-inline">
					                <?php foreach ($authors as $value) : ?>
					                    <li><?php echo $this->Image->resize($value['User']['avatar'] , 50, 50, array('class' => 'img-circle', 'url' => array('controller' => 'profile', 'action' => $value['User']['name'].'/'.$value['User']['id']))); ?></li>
					                <?php endforeach; ?>
					            </ul>
								<?php echo $this->Html->link('Voir l\'arbre', array('controller' => 'trees', 'action' => 'view', $tree['Tree']['slug']), array('class' => 'btn btn-block btn-primary')); ?>
							</div>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="portlet light">
							<div class="portlet-title">
								<h1><?php echo $tree['Tree']['title']; ?></h1>
							</div>
							<div class="portlet-body">
								<p class="book-layout">
									<?php echo $tree['Tree']['content']; ?>
								</p>
							</div>
						</div>
					</div>
				</div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>
    <!-- END CONTENT -->s
</div>
<!-- END CONTAINER -->
