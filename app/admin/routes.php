<?php

/**
 * This is an array for all routes in the application.
 *
 * It is an array of arrays
 *
 * the structure of the inner array looks like this
 * <code>
 *
 * [
 *      'uri' => Uri for the route, can be different from the file name(recommended both filename and uri should have same name)
 *      'name'=> Name of the route (Just for distinguishing),
 *      'for' => Either front or back (Front should be loaded for all the users while back is for admin only
 *      'file'=> The file to be loaded from app/front/
 * ]
 *
 * </code>
 */

$routes = array(
  [
    'uri' => '/',
    'name'=> 'MainPage',
    'for' => 'front',
    'file' => 'home'
  ],
  [
    'uri' => 'admin',
    'name'=> 'MainAdminPage',
    'for' => 'admin',
    'file' => 'home',
    'use_temp' => true,
  ],
  [
    'uri' => 'admin/login',
    'name'=> 'MainAdminPage',
    'for' => 'admin',
    'file' => 'login'
  ],
    [
        'uri' => 'admin/courses',
        'name'=> 'MainAdminPage',
        'for' => 'admin',
        'file' => 'courses',
        'use_temp' => true,
    ],
  [
    'uri' => 'dashboard',
    'name'=> 'MainWelcomePage',
    'for' => 'front',
    'file' => 'dashboard'
  ],
  [
    'uri' => 'dashboard/departments/science',
    'name'=> 'MainWelcomePage',
    'for' => 'front',
    'file' => 'dep.science'
  ],
  [
    'uri' => 'dashboard/departments/commercial',
    'name'=> 'MainWelcomePage',
    'for' => 'front',
    'file' => 'dep.commercial'
  ],
  [
    'uri' => 'dashboard/departments/art',
    'name'=> 'MainWelcomePage',
    'for' => 'front',
    'file' => 'dep.art'
  ],
  [
    'uri' => 'dashboard/suggest',
    'name'=> 'SuggestionPage',
    'for' => 'front',
    'file' => 'suggest'
  ],
  [
    'uri' => 'logout',
    'name'=> 'LogoutPage',
    'for' => 'front',
    'file' => 'logout'
  ],
  [
    'uri' => 'login',
    'name'=> 'LoginProcessingPage',
    'for' => 'front',
    'file' => 'login'
  ],
  [
    'uri' => 'forgot-password',
    'name'=> 'ForgotPasswordPage',
    'for' => 'front',
    'file' => 'forgot-password'
  ]

);

return $routes;
