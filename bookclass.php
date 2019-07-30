<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_bookclass.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'My Courses', $dir . App::$pageMyCourses),
        new Path(TRUE, 'Booking Class', $dir . App::$pageBookClass)
    );
    if(Session::checkUserExisted()){

        Header::initHeader($dir,"Booking Class"); 

        BookingClass::initView($dir, $paths);

        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
    
    