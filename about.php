<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_about.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "เกี่ยวกับบริษัท", '')
    );
    $error_code = $io->get->err;
    Header::initHeader($dir, 'เกี่ยวกับบริษัท'); 
    ViewAbout::initView($dir, $sess, $paths);
    Footer::initFooter($dir); 

