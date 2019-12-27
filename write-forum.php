<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_writeforum.php');
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_category.php');

 
   
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'เขียนบทความ', '')
    );

    if($sess->checkUserExisted()){
        $result = FunCategory::get($api);
        $catagory = $result->response;
        Console::log("dasd",$catagory);
        Header::initHeader($dir,"เขียนบทความ"); 
        WriteForumView::initView($dir, $sess, $paths, $api, $catagory);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
