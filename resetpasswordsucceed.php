<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php';
    Includer::include_proto($dir);
    Includer::include_view($dir, 'view_resetpasswordsucceed.php');

    $sess = new Sess();
    $auth = $sess->getAuth();
    $apiKey = $sess->getAPIKey();

    $api = new API($apiKey); 
    $io = new IO();


    Header::initHeader($dir, "การตั้งรหัสผ่านใหม่ สำเร็จ!"); 
    ResetPasswordSucceedView::initView($dir);
    Footer::initFooter($dir); 
    

        
    
    



