<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_contact.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "ติดต่อเรา", '')
    );
    $error_code = $io->get->err;
    Header::initHeader($dir, 'ติดต่อเรา'); 
    ViewContact::initView($dir, $paths);
    Footer::initFooter($dir); 

