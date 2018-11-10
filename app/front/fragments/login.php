<?php

prevent_d_access();

if($_SERVER['REQUEST_METHOD'] === "POST") {
  $username = post('username');
  $password = post('password');

  $user = $db->dlookup('*', 'users', 'email = ? OR username = ?', array($username,$username));


  if(is_array($user) && password_verify($password, $user['password_hash'])){
    log_user($user['id']);
  } else {
    error_flash('login', 'Invalid Credentials');
    redirect('/');
  }

}
