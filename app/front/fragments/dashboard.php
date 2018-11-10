<div class="row full-page">
  <div class="masthead full-page">
    <img src="<?= get_image('fallback.jpg') ?>" class="img-fluid" alt="">
  </div>


  <div class="col-sm-12 page-content welcome">
    <div class="row">
      <?php if($flash = get_flash('signup_msg') ) { ?>
        <div class="col-sm-4 offset-sm-4 text-center">
          <div class="alert alert-success">
            <strong>
              <?= $flash ?>
            </strong>
          </div>
        </div>
      <?php } else if($flash = get_flash('login')) {?>
        <div class="col-sm-4 offset-sm-4 text-center">
          <div class="alert alert-success">
            <strong>
              <?= $flash ?>!!!
            </strong>
          </div>
        </div>
      <?php } else if ($flash = get_flash('forgot-password')) { ?>
        <div class="col-sm-4 offset-sm-4 text-center">
          <div class="alert alert-success">
            <strong>
              <?= $flash ?>!!!
            </strong>
          </div>
        </div>
      <?php } ?>

      <div class="container">
        <div class="row">
          <div class="col-12 text-center mt-3" style="color: #fefefe;">
            <h2>Choose a Department to Begin With</h2>
          </div>
          <div class="col-4 box mt-4 text-center">
            <a class="dep-header d-block science " href="<?= site_url('dashboard/departments/science') ?>">
              <div class="img">
                <img src="<?= get_image('science.png') ?>" alt="" class="img-fluid">
              </div>
              <h3 class="my-3">Science</h3>
            </a>

          </div>

          <div class="col-4 box mt-4 text-center">
            <a class="dep-header d-block commercial " href="<?= site_url('dashboard/departments/commercial') ?>">
              <div class="img">
                <img src="<?= get_image('commercial.png') ?>" alt="" class="img-fluid">
              </div>
              <h3 class="my-3">Commercial</h3>
            </a>
          </div>

          <div class="col-4 box mt-4 text-center">
            <a class="dep-header d-block arts" href="<?= site_url('dashboard/departments/art') ?>">
              <div class="img">
                <img src="<?= get_image('art.jpg') ?>" alt="" class="img-fluid">
              </div>
              <h3 class="my-3">Arts</h3>
            </a>
          </div>

          <div class="col-12 text-center my-4">
            <div class="" style="position: relative">
              <div class="divider">
                <strong>
                  OR
                </strong>
              </div>
            </div>

          </div>

          <div class="col-12 text-center mt-1">
            <a class="btn btn-lg suggest-btn btn-warning" href="<?= site_url('dashboard/suggest') ?>">
              Let Me Suggest For You
            </a>
          </div>
        </div>
      </div>


    </div>



  </div>
</div>
