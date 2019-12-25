<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_feedback.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "รายงานข้อผิดพลาด", '')
    );
    $error_code = $io->get->err;
    Header::initHeader($dir, 'รายงานข้อผิดพลาด'); 
    FeedbackView::initView($dir, $sess, $paths, $error_code);
    Footer::initFooter($dir); 

