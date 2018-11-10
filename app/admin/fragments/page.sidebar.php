<?php
prevent_d_access();
?>
<div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?= site_url('admin/') ?>" class="site_title"><i class="fa fa-paw"></i> <span>Welcome Admin!</span></a>
    </div>
    <div class="clearfix"></div>

    <!-- /menu prile quick info -->
    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <?php load_fragment('page.sidebar.menu') ?>
    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <?php load_fragment('page.sidebar.footer') ?>
    </div>
    <!-- /menu footer buttons -->
  </div>