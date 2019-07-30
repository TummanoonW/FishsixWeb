<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_myschedule.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', Nav::$rootURL),
        new Path(FALSE, 'My Courses', $dir . Nav::$pageMyCourses),
        new Path(FALSE, 'Booking Class', $dir . Nav::$pageBookClass),
        new Path(TRUE, 'MY Schedule', $dir . Nav::$pageMySchedule)
    );

   if(Session::checkUserExisted()){
        
        Header::initHeader($dir,"MY Schedule"); 

        MySchedule::initView($dir, $paths);
    
        Footer::initFooter($dir); 
    
   }else{
        Nav::gotoHome();
    }

    