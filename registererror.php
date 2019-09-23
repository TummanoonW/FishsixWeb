<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php';
    Includer::include_proto($dir);
    Includer::include_view($dir, 'view_registererror.php');

    $auth = Session::getAuth();
    $apiKey = Session::getAPIKey();

    $api = new API($apiKey); 
    $io = new IO();

    Header::initHeader($dir, "การสมัครสมาชิกล้มเหลว"); 
    RegisterErorrView::initView($dir);
    Footer::initFooter($dir); 
    

        
    
    



