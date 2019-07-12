<?php

    include_once './includer/includer.php'; 
    Includer::include_proto('./'); 
    Includer::include_view('./', 'view_home.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $dir = './';

    Header::initHeader($dir, App::$name); 

    if(Session::checkUserExisted()){
        HomeView::initView($dir);
    }else{
        HomeView::initView($dir); 
    }
    
    Footer::initFooter($dir); 
?>
    