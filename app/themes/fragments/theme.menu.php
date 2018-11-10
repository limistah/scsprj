<?php

    prevent_d_access();

    /**
    * This is the navigation/menu file of a theme.
    * It is expected to be used only for menu contents
    * Although other uses might come in handy as it is being injected directly
    * into the theme <header> </header> tag
    */

?>

  <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
      <i class="fa fa-list"></i>
    </button>

    <a class="navbar-brand text-danger">SCS</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <?php if(is_logged_in()) { ?>
          <li class="nav-item <?= request_uri === 'dashboard' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item <?= request_uri === 'dashboard/suggest' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= site_url('dashboard/suggest') ?>">Suggest</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('logout') ?>">Logout (<?= $user->username ?>)</a>
          </li>
        <?php } else { ?>
          <li class="nav-item <?= request_uri === '/' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= site_url('/') ?>">Home</a>
          </li>

        <?php } ?>
      </ul>
    </div>
  </nav>
