<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_branches.php');
    Includer::include_fun($dir, 'fun_branch.php');
    
    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 
  
    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "สาขาของเรา", '')
    );
    $result = FunBranch::get($api);
    $branchs = $result->response;

    Header::initHeader($dir, 'สาขาของเรา'); 
    ViewBranches::initView($dir, $paths, $branchs);
    Footer::initFooter($dir); 

