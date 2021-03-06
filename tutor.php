<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_tutor.php');
    
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 
  
    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "ผู้สอน", '')
    );

    Header::initHeader($dir, 'ผู้สอน'); 
    ViewTutor::initView($dir, $sess, $paths);
    Footer::initFooter($dir); 

