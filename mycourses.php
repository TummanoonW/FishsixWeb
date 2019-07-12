<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_mycourses.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserExisted()){

        Header::initHeader($dir, $auth->username . " - My Courses"); 

        MyCoursesView::initView($dir);

        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome();
    }
