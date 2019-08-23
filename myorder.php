<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_myorder.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(TRUE, 'My Order', $dir . App::$pageMyOrder)
    );

    if(Session::checkUserExisted()){
            
        Header::initHeader($dir,"My Order"); 

        MyOrderView::initView($dir, $paths);

        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
