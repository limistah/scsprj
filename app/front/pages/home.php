<?php
/**
 * Created by PhpStorm.
 * User: Aby
 * Date: 5/23/2017
 * Time: 2:53 PM
 */

echo 'Frontend Homepage';
  /*
  * This file should be loaded if the homepage route config looks like
  *  [
  *     'uri' => '/',
  *     'name'=> 'MainPage',
  *     'for' => 'front',
  *     'file' => 'home'
  *     'use_temp' => true
  *  ]
  *
  * That is no use_temp is set or use_temp is set to false
  */

?>


<div class="row">
    <div class="col-xs-12">
        <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>
                This is coming from the homepage route file loaded from the pages folder.
                This means that template useage have been configured for this route.
            </p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
    </div>
</div>