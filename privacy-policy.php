<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_privacy_policy.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "นโยบาลส่วนบุคคล", '')
    );
    $error_code = $io->get->err;
    Header::initHeader($dir, 'นโยบาลส่วนบุคคล'); 
    ViewPrivacy::initView($dir, $paths);
    Footer::initFooter($dir); 

