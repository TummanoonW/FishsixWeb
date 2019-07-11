<?php
    include_once './includer/includer.php'; 
    Includer::include_proto('./'); 
    Includer::include_view('./', 'view_mycourses.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserExisted()){

        Header::initHeader($auth->username . " - My Courses"); 

        MyCoursesView::initView();

        Footer::initFooter(); 

    }else{
        Nav::gotoHome();
    }
