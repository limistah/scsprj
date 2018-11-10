<?php

  if($_SERVER['REQUEST_METHOD'] === "POST" && post('submit') === 'forgot-password') {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if(isset($email, $password) && is_string($email) && is_string($password)) {
      $exists = $db->dlookup('id, email', 'users', 'email = ?', [$email]);
      if(is_array($exists)) {
        if( $db->update('users', ['password_hash' => $password], 'email = ?', [$email]) ) {
          success_flash('forgot-password', 'Password has been updated sucessfully');
          log_user($exists['id']);
          redirect('dashboard');
        } else {
          error_flash('forgot-password', 'Error updating password. Please try again');
        }
      } else {
        error_flash('forgot-password', 'The email does not correspond to any user');
      }
    }
  }


?>





<div class="row full-page">
  <div class="masthead full-page">
    <img src="<?= get_image('fallback.jpg') ?>" class="img-fluid" alt="">
  </div>

  <div class="col-sm-12 page-content forgot-password">
    <div class="row">
      <div class="col-sm-4 offset-sm-4 mt-2">
        <form class="form my-5" action="" method="post">
          <h2 class="header login text-center" style="color: #fefefe;">Update Password</h2>

          <?php if($error = get_flash('forgot-password', 'error')) : ?>
            <div class="alert alert-danger">
              <?= $error ?>
            </div>
          <?php endif; ?>

          <div class="alert alert-danger p-error" style="display: none;">
            Passwords do not match.
          </div>

          <div class="form-group">
            <input type="text" required="required" name="email" placeholder="Email" class="form-control username">
          </div>
          <div class="form-group">
            <input type="password" required="required" name="password" placeholder="Password" class="form-control password">
          </div>

          <div class="form-group">
            <input type="password" required="required" name="r-password" placeholder="Repeat Password" class="form-control r-password">
          </div>

          <button type="submit" name="submit" value="forgot-password" class="btn btn-primary btn-block">Login</button>
        </form>
      </div>
    </div>
  </div>

</div>
