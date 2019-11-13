<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_feedback.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "รายงานข้อผิดพลาด", '')
    );

    Header::initHeader($dir, 'รายงานข้อผิดพลาด'); 
    FeedbackView::initView($dir, $paths);
    Footer::initFooter($dir); 

