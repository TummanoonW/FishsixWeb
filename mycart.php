<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_mycart.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', Nav::$rootURL),
        new Path(TRUE, 'Cart', $dir . Nav::$pageMyCart)
    );

    if(Session::checkUserExisted()){

        Header::initHeader($dir,"Shopping Cart"); 

        MyCartView::initView($dir, $paths);

        Footer::initFooter($dir); 
        
    }else{
        Nav::gotoHome();
    }

