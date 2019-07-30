<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php';
    Includer::include_proto($dir);
    Includer::include_view($dir, 'view_resetpasswordsucceed.php');

    $auth = Session::getAuth();
    $apiKey = Session::getAPIKey();

    $api = new API($apiKey); 
    $io = new IO();

    if(Session::checkUserExisted()){
        Nav::gotoHome();
    }else{
        Header::initHeader($dir, "Reset password Succeend"); 
        
        ResetPasswordSucceedView::initView($dir);

        Footer::initFooter($dir); 
    }

        
    
    



