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
      <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
      <li class="active open">
        <a href="javascript:;">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
        </a>
        <ul class="sub-menu">
          <li class="<?php echo $this->request->controller === 'users' ? 'active' : ''; ?>">
            <?php echo $this->Html->link('Utilisateurs', array('controller' => 'users', 'action' => 'index')); ?>
          </li>
          <li class="<?php echo $this->request->controller === 'contributions' ? 'active' : ''; ?>">
            <?php echo $this->Html->link('Contributions', array('controller' => 'contributions', 'action' => 'index')); ?>
          </li>
          <li class="<?php echo $this->request->controller === 'trees' ? 'active' : ''; ?>">
            <?php echo $this->Html->link('Arbres', array('controller' => 'trees', 'action' => 'index')); ?>
          </li>
          <li class="<?php echo $this->request->controller === 'trees' ? 'active' : ''; ?>">
            <?php echo $this->Html->link('Entreprises', array('controller' => 'entreprises', 'action' => 'index')); ?>
          </li>
        </ul>
      </li>
    </ul>
    <!-- END SIDEBAR MENU -->
  </div>
</div>
<!-- END SIDEBAR -->
