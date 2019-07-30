<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php';
    Includer::include_proto($dir);
    Includer::include_view($dir, 'view_resetpassword.php');

    $auth = Session::getAuth();
    $apiKey = Session::getAPIKey();

    $api = new API($apiKey); 
    $io = new IO();

    if(Session::checkUserExisted()){
        Nav::gotoHome($dir);
    }else{
        Header::initHeader($dir, "Reset Password"); 
        
        ResetPasswordView::initView($dir);

        Footer::initFooter($dir); 
    }

        
    
    



