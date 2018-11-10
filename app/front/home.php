<?php
  /*
  * This file should be loaded if the homepage route config looks like
  *  [
  *		'uri' => '/',
  *     'name'=> 'MainPage',
  *     'for' => 'front',
  *     'file' => 'home'
  *	 ]
  *
  * That is no use_temp is set or use_temp is set to false
  */
  if(is_logged_in()) redirect('dashboard');
?>

<?php

  if($_SERVER['REQUEST_METHOD'] === "POST") {
    $p = $_POST;
    extract($p);

    if(post('submit') === 'login') {

      $user = $db->dlookup('id, password_hash',
                'users', 'email = ? OR username = ?',
                [$username, $username]
              );

      if(is_array($user) && password_verify($password, $user['password_hash'])){
        log_user($user['id']);
        success_flash('login', 'Login Successful');
        redirect('dashboard');
      } else {
        error_flash('login', 'Invalid Credentials');
        redirect('/');
      }
    } else if(post('submit') === 'signup') {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $arr = [
        'username' => $username,
        'password_hash' => $password,
        'email' => $email,
        'created_at' => time()
      ];

      $exists = $db->dlookup('email, username', 'users', 'email = ? || username = ?', [$email, $username]);

      if(is_array($exists) && count($exists) > 0) {
        error_flash('signup', 'The email/password already exists');
      } else {
        if ( $db->insert('users', $arr) ) {
          success_flash('signup_msg', 'Signup Was successful');
          $id = $db->dlookup('id', 'users', 'id = ?', [$db->insert_id()] );
          log_user($id);
          redirect('dashboard');
        } else {
          error_flash('signup', 'Error signing you up, try again');
        }
      }
    }
  }
?>

<div class="row full-page">
  <div class="masthead full-page">
    <img src="<?= get_image('fallback.jpg') ?>" class="img-fluid" alt="">
  </div>


  <div class="col-sm-12 page-content">
    <div class="row">
      <div class="col-sm-8 home-copy">
        <div class="row" style="height: 100%">
          <div class="col-12 content-box" style="height:100%">
            <div class="slider">
              
              <div class="mt-5 mb-5">
                <span class="career">
                  Career Guidance 
                </span>
                <span class="and d-block">
                  <em>and</em>
                </span>
                <span class="information">
                  Information System
                </span>

                <!-- <blockquote cite="" class="mt-3 qoute text-center">
                  <span>
                    <em>
                      If you are properly guided, you will be successful
                    </em>
                  </span>
                </blockquote> -->
                  
              </div>

              <div class="text-center">
                <a class="btn btn-success btn-lg" onclick="$('.username').focus(); return false">Start Here</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-4 forms-cont">
        <div class="row">
          <div class="col-sm-12 login-form">
            <?php if($error = get_flash('login', 'error')) : ?>

              <div class="alert alert-danger">
                <?= $error ?>. <a href="<?= site_url('forgot-password') ?>"> Forgotten Password? </a>
              </div>
            <?php endif; ?>
            <form class="form" action="" method="post">
              <?php if(!$error = get_flash('login', 'error')) : ?>
                <h2 class="header login text-center">Login Here</h2>
              <?php endif; ?>

              <div class="form-group">
                <input type="text" required="required" name="username" placeholder="Username/Email" class="form-control username">
              </div>
              <div class="form-group">
                <input type="password" required="required" name="password" placeholder="Password" class="form-control">
              </div>

              <button type="submit" name="submit" value="login" class="btn btn-primary btn-block">Login</button>
            </form>
          </div>

          <div class="col-12 divider">
            OR
          </div>

          <div class="col-12 signup-form">
            <form class="form" action="" method="post">

              <?php if($error = get_flash('signup', 'error')) { ?>
                <div class="alert alert-danger">
                  <?= $error ?>
                </div>
              <?php } else {  ?>
                <h2 class="header signup text-center">Signup Now!</h2>
              <?php } ?>

              <div class="form-group">
                <input type="text" required="required" name="username" placeholder="Username" class="form-control">
              </div>
              <div class="form-group">
                <input type="email" required="required" name="email" placeholder="Email" class="form-control">
              </div>
              <div class="form-group">
                <input type="password" required="required" name="password" placeholder="Password" class="form-control">
              </div>

              <button type="submit" name="submit" value="signup" class="btn btn-danger btn-block">Sign Up</button>
            </form>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
