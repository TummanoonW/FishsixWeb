<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php';
    Includer::include_proto($dir);
    Includer::include_view($dir, 'view_registersucceed.php');

    $sess = new Sess();
    $auth = $sess->getAuth();
    $apiKey = $sess->getAPIKey();

    $api = new API($apiKey); 
    $io = new IO();


    Header::initHeader($dir, "สมัครสมาชิกสำเร็จ"); 
    RegisterSucceedView::initView($dir, $sess);
    Footer::initFooter($dir); 
    

        
    
    



