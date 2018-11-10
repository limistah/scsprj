<?php
prevent_d_access();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?= isset($page_title) ? site_title . ' &rsaquo;&rsaquo; ' . $page_title : site_title?></title>

        <!-- Bootstrap core CSS -->
        <?php
        // Load specified styles
        load_styles(array('bs3', 'animate.min', 'custom',
            'maps/jquery-jvectormap-2.0.3', 'icheck/flat/green',
            'floatexamples'

        ));
        // Load specified scripts on page load
        load_scripts(array('jquery-2.1.1.min', 'nprogress'));
        ?>
        <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

        <link href="<?=assets_url?>/fonts/css/font-awesome.css" rel="stylesheet">
        <!-- <link href="css/animate.min.css" rel="stylesheet"> -->

        <!-- Custom styling plus plugins -->
        <!-- <link href="css/custom.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
        <link href="css/icheck/flat/green.css" rel="stylesheet" />
        <link href="css/floatexamples.css" rel="stylesheet" type="text/css" /> -->

        <!-- <script src="js/jquery.min.js"></script>
        <script src="js/nprogress.js"></script> -->

        <!--[if lt IE 9]>
            <script src="<?=assets_url?>js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="nav-md">
        
        <?= $content ?>

        <?php
            // Load specified scripts on page load
            load_scripts(array(
                'bs3', 'icheck/icheck.min',
                'progressbar/bootstrap-progressbar.min', 'nicescroll/jquery.nicescroll.min', 
                'moment/moment.min', 'datepicker/daterangepicker', 'custom',

            ));

            /**
            *    <!-- flot js -->
            *    <!--[if lte IE 8]>
            *        <script type="text/javascript" src="<?= assets_url ?>js/excanvas.min.js"></script>
            *   <![endif]-->
            */
            load_scripts(array(
                'flot/jquery.flot', 'flot/jquery.flot.pie', 'flot/jquery.flot.orderBars', 'flot/jquery.flot.time.min',
                'flot/date', 'flot/jquery.flot.spline', 'flot/jquery.flot.stack', 'flot/jquery.flot.stack', 
                'flot/curvedLines','flot/jquery.flot.resize'
            ));

            //<!-- worldmap -->
            load_scripts(array(
                'maps/jquery-jvectormap-2.0.3.min', 'maps/gdp-data', 'maps/jquery-jvectormap-world-mill-en', 'maps/jquery-jvectormap-us-aea-en',
            ));
        
            //<!-- pace -->
            load_scripts(array('pace/pace.min', 'pace-gentellela'));

            //<!-- skycons -->
            //<!-- dashbord linegraph -->
            //<!-- datepicker -->
            load_scripts( 'skycons/skycons.min');

        ?>
        

    </body>
</html>
