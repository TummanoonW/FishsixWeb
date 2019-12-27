<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_forumsingle.php');
    Includer::include_fun($dir, 'fun_forum.php');
  

 
   
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'รายละเอียดบทความ', '')
    );

    if($sess->checkUserExisted()){
        
        Header::initHeader($dir,"รายละเอียดบทความ"); 
        ForumSingleView::initView($dir, $sess, $paths, $api );
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
