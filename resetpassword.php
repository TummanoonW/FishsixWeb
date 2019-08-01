<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php';
    Includer::include_proto($dir);
    Includer::include_view($dir, 'view_resetpassword.php');
    Includer::include_fun($dir, 'fun_auth.php');

    $auth = Session::getAuth();
    $apiKey = Session::getAPIKey();

    $api = new API($apiKey); 
    $io = new IO();

    $result = FunAuth::verifyToken($api, $io->id);
    if($result->success){
        $record = $result->response;
        Header::initHeader($dir, "Reset Password"); 
        ResetPasswordView::initView($dir, $io->id);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
    

        
    
    



