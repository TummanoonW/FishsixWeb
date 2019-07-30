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
        new Path(FALSE, 'Home', $dir),
        new Path(TRUE, 'MY Schedule', $dir . App::$pageMySchedule)
    );

    if(checkUserExisted()){
        
        Header::initHeader($dir,"MY Schedule"); 

        MySchedule::initView($dir, $paths);
    
        Footer::initFooter($dir); 
    
    }else{
        Nav::gotoHme();
    }

    