<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_teachers.php');
    Includer::include_fun($dir, 'fun_auth.php');
    
    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 
  
    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, "ผู้สอน", '')
    );

    $result = FunAuth::getTeachers($api);
    $teachers = $result->response;

    Console::log('teachers', $teachers);

    Header::initHeader($dir, 'ผู้สอน'); 
    ViewTeachers::initView($dir, $paths, $teachers);
    Footer::initFooter($dir); 

