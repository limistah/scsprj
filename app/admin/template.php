<div class="container body">
    <div class="main_container">
        <!-- Left Sidebar -->
        <div class="col-md-3 left_col">
          <?php load_fragment('page.sidebar') ?>
        </div>
        <!-- /Left Sidebar -->

        <!-- top navigation -->
        <div class="top_nav">
            <?php load_fragment('page.topnav') ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">


            <?php include_once(route_file) ?>

            <!-- footer content -->

            <!-- /footer content -->
        </div>
        <!-- /page content -->
    </div>
</div>
<div id="custom_notifications" class="custom-notifications dsp_none">
  <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
  </ul>
  <div class="clearfix"></div>
  <div id="notif-group" class="tabbed_notifications"></div>
</div>