<?php
$status_messages=array();

define('CD_FORMAT','Y/m/d H:i:s');

$banks=array(
    '11'=>'Access Bank',
    '6'=>'Afri Bank',
    '21'=>'Citi Bank',
    '18'=>'Diamond Bank',
    '8'=>'Eco Bank',
    '13'=>'FCMB',
    '17'=>'Fidelity',
    '1'=>'First Bank',
    '4'=>'GTB',
    '14'=>'Heritage Bank',
    '15'=>'Keystone',
    '19'=>'Skye Bank',
    '20'=>'Stanbic IBTC Bank',
    '22'=>'Standard Chartered',
    '7'=>'Sterling Bank',
    '9'=>'UBA',
    '5'=>'Union Bank',
    '12'=>'Unity Bank',
    '10'=>'WEMA Bank',
    '16'=>'Zenith Bank',
);

function load_user_data($id, $admin = false) {
    global $db;
    $user = $db->dlookup('*','users',' id =  ?',array( $id ) );
    if (isset($user) && $admin) {
      $user = $user['admin'] == '1' ? $user : false;
    }

    return isset($user) && $user !== false ? (object) $user : false;
}

function log_user($id) {
  if (isset($id) && !empty($id)) {
    $_SESSION['user_id'] = $id;
  }
}

function unlog_user() {
  $_SESSION = [];
  session_destroy();
}

function is_logged_in () {
  return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}
