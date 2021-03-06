<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_terms_and_conditions.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "ข้อตกลงและเงือนไข", '')
    );
    $error_code = $io->get->err;
    Header::initHeader($dir, 'ข้อตกลงและเงือนไข'); 
    ViewTerm::initView($dir, $sess, $paths);
    Footer::initFooter($dir); 

