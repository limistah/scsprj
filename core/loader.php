<?php

/**
 * Date: 5/23/2017

 * Time: 1:08 PM

 */



@session_start();

define('EXEC', '1.0.0');
define('DEV', 0);
define('PROD', 1);
define('VERSION', '1.0.0');
define('LPATH', str_replace('\\','/',__DIR__));

// Front controller path
define('FCPATH', str_replace('\\','/',dirname(__DIR__)) . '/');

//Path for assets
define('ASSETS', FCPATH . 'assets/');

// Path for images
define('IMAGES', ASSETS . 'mages/');


// Application files path
define('APP_PATH', dirname(__FILE__) . '/../app/');

//Title for the site
define ('site_title','Self Counselling Career Guidance Sytem');

//Default time zone ( Change to yours )
date_default_timezone_set('Africa/Lagos');


// Detects the protocol that the server is running on
$protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");

// Server host (Mostly the name of a website after www.)
$host=$_SERVER['HTTP_HOST'];

$app_mode = $host === 'localhost' ? 'DEV' : 'LIVE';

// Constructs base url from the derived protocol and host
$base_url = $protocol."://".$host;

// Constructs a base url without the ending index.php
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);

// The root file that loaded this script
$base_root=str_replace('/index.php', '/', $_SERVER['PHP_SELF']);


// Detects the query string being passed
if (substr($_SERVER['QUERY_STRING'], 0, 2)=='q=') {
    //query string mode detected
    $request_uri=substr($_SERVER['QUERY_STRING'], 2);
    $request_uri=ltrim($request_uri, '/');
} else {
    //pretty url mode
    $uri_protocol='REQUEST_URI';

    if($base_root=='/') {
        $base_root='';
    }
    $request_uri= str_replace($base_root, '', $_SERVER[$uri_protocol]);
}

// Parses request_url to be the same as request_uri
$request_url = $request_uri;

// Explodes the request_uri to catch the query string
$e = explode('?', $request_uri);

// Trims the query string($request_uri) of it's leading slash and set it to $request_uri
$request_uri = trim($e[0], '/');

// Sets request_uri to a leading slash if empty
if(empty($request_uri)) {
    $request_uri='/';
}

$request_uri = ($request_uri === 'index.php' || $request_uri ==='index') ? '/' : $request_uri;

// Create site-wide constants from the generated variables
define('base_url', $base_url);
define('protocol', $protocol);
define('host', $host);
define('base_root', $base_root);
define('request_uri', $request_uri);
define('request_url', $request_url);
define('current_url', base_url.request_url);
define('APP_MODE', $app_mode);
define('assets_url', base_url.'assets');
define('base_image_path', base_url . "assets/images/");


include dirname(__FILE__)."/lib/api.php";



//check device start
$detect = new Mobile_Detect;

$myDevice="pc";



// Check for any mobile device, excluding tablets.
if ($detect->isMobile() && !$detect->isTablet()) {
    $myDevice="mobile";
}

//get the url
$url=request_uri;

// Fetches all the specified routes
$routes = require os_path(APP_PATH . 'routes.php');

$script = '';
$path = '';
$subPath = '';
$file = '';
$temp = '';
$route_file = '';
$route_fragment = '';


// This section of the loader checks if the request is coming from an ajax call.
//So that we won't be going down the line of loading the whole app with themes and html

if($route = is_ajax($request_uri)) {
  $route_file = APP_PATH . 'ajax/' . $route .  '.php';
  if(file_exists($route_file)) {
    include $route_file;
  }

  $ajax_response = !isset($ajax_response) ? [] : $ajax_response;
  echo format_ajax_request($ajax_response);
  die();
}

$script .= '<script type="text/javascript">window.base_url = "' . $base_url . '"</script>';

if($route = route_match($request_uri, $routes)){
    if(strtolower($route['for']) === 'admin') {
        define('admin_mode', true);
        define('auth_user_mode', false);
    } else if(strtolower($route['for']) === 'dashboard') {
        define('auth_user_mode', true);
        define('admin_mode', false);
    } else {
        define('auth_user_mode', false);
        define('admin_mode', false);
    }

    $subPath = $route['for'];
    $file = $route['file'];
    $temp = os_path(APP_PATH . $route['for'] . '/' . "template.php");
    $route_file = os_path(APP_PATH . $route['for'] . '/pages/'. $route['file'] .'.php');
    $route_fragment = os_path(APP_PATH . $route['for'] . '/fragments/');

    defined('temp_path') OR define('temp_path', $temp);
    defined('route_file') OR define('route_file', $route_file);
    defined('route_fragments') OR define('route_fragments', $route_fragment);

    if( empty($subPath)) {
        $path = os_path(APP_PATH . "{$file}.php");
    } else if(isset($route['use_temp']) && $route['use_temp']) {
        $path = $temp;
    } else {
        $path = os_path(APP_PATH . "{$subPath}/{$file}.php");
    }

} else {
    $path = os_path(APP_PATH . "404.php");
}

$theme_fragment = os_path(APP_PATH . 'themes/fragments/');
defined('theme_fragments') OR define('theme_fragments', $theme_fragment);

defined('admin_mode') OR define('admin_mode', false);
defined('auth_user_mode') OR define('auth_user_mode', false);


//Sets the required themeand user details
$id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;


if( admin_mode ) {
    $theme = 'theme.admin';
} else if ( auth_user_mode && admin_mode === false) {
    $theme = 'theme.authuser';
} else {
    $theme = 'theme';
}
$isDashboard = explode('/', request_uri)[0] === 'dashboard' ? true : false;

if( isset($subPath) && $subPath == "admin" || $isDashboard) {
    if($user = load_user_data($id, admin_mode) ) {
        if($user->blocked) {
            unlog_user();
            redirect("/");
        } else {
          log_user($user->id);
        }
    } else {
        $user=array('id'=>0,'first'=>'','last'=>'','email'=>'','blocked'=>0);
        $user=(object) $user;
        if($request_uri != 'admin/login')
            redirect(base_url."admin/login");
    }
}


//start output buffering
ob_start();

// include the required file for processing
if(file_exists($path)) {
  echo $script;
    include $path;
} else {
    echo "<span style='display: block; color: red; border: .5px solid red; padding: 5px 5px; font-size: 25px; text-align: center'>
               <b>
                    {$path} can not be resolved
                </b>
          </span>";
}

$content = ob_get_contents();
ob_end_clean();
// fetches and closes output buffering

// Includes the required theme which have access to the parsed data from route's file through $content
include os_path(APP_PATH . "themes/{$theme}" . '.php');

clear_flash();
