<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_contact.php');
    Includer::include_fun($dir, 'fun_branch');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "ติดต่อเรา", '')
    );


    $result = FunBranch::get($api);
    $branches = $result->response;

    Header::initHeader($dir, 'ติดต่อเรา'); 
    ViewContact::initView($dir, $paths, $branches);
    Footer::initFooter($dir); 

