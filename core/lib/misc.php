<?php

define('TIME_FORMAT', 'F j, Y H:i:s');

function redirect($url)
{
    $url=site_url($url);
    header("Location:$url");
    exit();
}


function site_url($uri='/')
{
    if (empty($uri)) {
        return trim(base_url,'/');
    } elseif (substr($uri, 0, 2)=='//') {
        return $uri;
    } elseif (substr($uri, 0, 4)=='www.') {
        return 'http://'.$uri;
    } elseif (substr($uri, 0, 5)=='http:') {
        return $uri;
    } elseif (substr($uri, 0, 6)=='https:') {
        return $uri;
    }

    $uri=trim($uri,'/');

    $pi=parse_url($uri);
    if (isset($pi['scheme']) && isset($pi['path'])) {
        return $pi;
    }

    $return=base_url . trim($uri, '/');

    return $return;
}


function set_active_menu($str)
{
    return $_SERVER['QUERY_STRING']==$str ? 'active' : '';
}

function set_active_tab($str)
{
    return $_SERVER['QUERY_STRING']==$str ? 'active in' : '';
}

function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function get($val) {return isset($_GET["$val"]) ? $_GET["$val"] : '';}
function post($val) {return isset($_POST["$val"]) ? $_POST["$val"] : '';}


function admin_only() {
    global $user;
    if(!$user->admin) {redirect("dashboard");}
}

function strip_query($path)
{
    $p=explode('?',$path);
    return $p[0];
}


/**
 * stdout
 *
 * standard output message processing
 *
 * @param   mixed    $info        The variable to be displayed on screen/console
 * @param   bool  $exit        Should execution be ceased after output?
 *
 * @param   void
 */
function stdout($info,$exit=false)
{
    $bt = debug_backtrace();
    $caller = array_shift($bt);

    $summary="";

    if(isset($caller['file']) && isset($caller['line'])) {
        $summary=$caller['file'].':'.$caller['line']."\n";
    }


    if (PHP_SAPI === 'cli') {
        print_r($info);
        echo "\n";
    } else {
        print '<pre style="padding: 1em; margin: 1em 0;">';
        echo "$summary";
        if(func_num_args() < 2) {
            print_r($info);
        } else {
            print_r($info);
            //print_r(func_get_args());
        }
        print '</pre>';
    }

    if($exit) {exit();}
}

function is_admin($usr=null) {
    if($usr==null) {$usr=$GLOBALS['user'];}

    return $usr->admin ? true : false;
}


function get_avatar_image($usr=null)
{
    if($usr==null) {$usr=$GLOBALS['user'];}

    $usr=(object) $usr;

    if($usr->avatar>0) {
        $src=get_file_url($usr->avatar);
        if($src!=null) {return $src;}
    }

    $src= $usr->gender==1 ? base_url.'assets/img/avatar_m.png' :  base_url.'assets/img/avatar_f.png';

    return $src;
}

/**
 * specify name of input field
 *
 */
function upload_file($name)
{
    global $user, $db;

    $result=0;
    if(isset($_FILES[$name]) && $_FILES[$name]['size'] > 0)
    {
        $fileName = $_FILES[$name]['name'];
        $tmpName  = $_FILES[$name]['tmp_name'];
        $fileSize = $_FILES[$name]['size'];
        $fileType = $_FILES[$name]['type'];

        $ext=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

        $location=IMAGES.sha1_file($tmpName).".{$ext}";

        if(!file_exists($location)) {

            $fp      = fopen($tmpName, 'r');
            $fileContent = fread($fp, filesize($tmpName));
            fclose($fp);

            file_put_contents($location,$fileContent);
        }


        $location=str_replace(FCPATH,'',$location);


        $post=array();

        $post['owner']=$user->id;
        $post['name']=$fileName;
        $post['size']=$fileSize;
        $post['type']=$fileType;
        $post['ext']=$ext;
        $post['location']=$location;
        $post['time']=time();

        if($result=$db->dlookup('id',"files","location=? and owner=?",array($post['location'],$post['owner']))){

        } else {
            $db->insert("files",$post);
            $result=$db->insert_id();
        }
    }
    return $result;
}

function get_file_url($id=0)
{
    global $db;
    if($location=$db->dlookup('location',"files","id=?",array($id))){
        if(file_exists(FCPATH.$location)) {
            return base_url . $location;
        }
    }
    return null;
}


function intCodeRandom($length = 6)
{
  $codeRandom = mt_rand($intMin, $intMax);
  return $codeRandom;
}

function generatePin() {
  global $db;
  $pin  = intCodeRandom();
  while($db->dlookup('pin', 'pins', 'pin = ?', array($pin))) {
      $pin  = intCodeRandom();
  }
  return $pin;
}

function route_match($request_uri, $routes) {
  foreach ($routes as $route) {
    if($route['uri'] === $request_uri)
      return $route;
  }
}

function os_path ($path) {
  return str_replace('/', DIRECTORY_SEPARATOR, $path);
}

function prevent_d_access() {
  defined('EXEC') or die('Unauthorized Access/Accessing through unverified route');
}

function set_active_link($route = "/") {
    return request_uri == $route ? "active" : "";
}

function load_fragment($name, $from='route') {
    $fragment = '';

    switch($from) {
        case 'route': {
            $fragment = os_path(route_fragments . $name . '.php');
            break;
        }
        case 'themes':
        case 'theme':
                $fragment = os_path(theme_fragments . $name . '.php');
    }

    if (file_exists($fragment) ) {
        include $fragment;
        return true;
    }
    return false;
}

function get_image($name) {
    return site_url(base_image_path . $name);
}

function load_styles($names) {
    if(is_array($names)) {
        foreach ($names as $n => $value) {
            load_styles($value);
        }
    } else if (is_string($names)) {
        $link = base_url . "assets/css/{$names}.css?v=" . time();
        $dom = "<link type=\"text/css\" rel=\"stylesheet\" href=\"{$link}\">";
        echo $dom;
    }
    return null;
}

function load_scripts($name) {
    if(is_array($name)) {
        foreach ($name as $n) {
            load_scripts($n);
        }
    } else if (is_string($name)) {
        $link = base_url . "assets/js/{$name}.js?v=" .time();
        $dom = "<script type=\"text/javascript\" src=\"{$link}\"></script>";
        echo $dom;
    }

    return null;
}
/*
* A generic function for setting a flash message.
* @param $type string The message type, either success|error|warning
* @param $name string The name used to denote the message in its type array
* @param $msg string The actual message that needs to be stored
*/
function set_flash($type = 'success', $name = '', $msg ='') {
  if(empty($type) || empty($name) || empty($msg)) return;
  $_SESSION['flash'][$type][$name] = $msg;
}

/*
* For setting a success flash mesage
*
* @param $name string Name to denote the success message with
* @param $msg string String value of the message to saved
*/

function success_flash($name, $msg) {
  if(empty($name) && !empty($msg)) return ;
  set_flash('success', $name, $msg);
}

/*
* For setting a error flash mesage
*
* @param $name string Name to denote the success message with
* @param $msg string String value of the message to saved
*/
function error_flash($name, $msg) {
  if(empty($name) && empty($msg)) return ;
  set_flash('error', $name, $msg);
}

/*
* ALlows for retrieving of flash messages
* @param $name string The name of the flash message that was used to stroe the flash message when calling either error_flash | success_flash | set_flash
* @param $type string (optional) This is the type of the flash message. Defaults to 'success'
*
* @return boolean | empty string
*/
function get_flash ($name, $type = 'success') {
  return ( isset($_SESSION['flash'][$type]) &&
            isset($_SESSION['flash'][$type][$name]) ) ?
              $_SESSION['flash'][$type][$name] : '';
}

/*
* Flushes all the flash messages from the session
*/
function clear_flash() {
  $_SESSION['flash'] = [];
  return ;
}

/*
* Checks if the uri matches our ajax call criteria
* @return string | boolean
*/

function is_ajax($uri) {
  $x_uri = explode('-', $uri);

  if(count($x_uri) === 2 && strtolower($x_uri[0]) === 'ajax') {
    return $x_uri[1];
  }

  return false;
}

function format_ajax_request ($response) {
  return json_encode($response);
}
