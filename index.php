<?php

    $dir = './';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_home.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    Header::initHeader($dir, App::$name); 

    if(Session::checkUserExisted()){
        HomeView::initView($dir);
    }else{
        HomeView::initView($dir); 
    }
    
    Footer::initFooter($dir); 
?>
    