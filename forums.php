<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_forum.php');
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_auth.php');
    Includer::include_view($dir, 'view_forumsingle.php');
 
   
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'บทความ', '')
    );
    $filter = (object)array(
         
    );
    //if($sess->checkUserExisted()){
        $result = FunForum::getTop($api, 5);
        $top = $result->response;
        Console::log("top",$result);
        $result = FunForum::getFiltered($api, $filter);
        $forumAll = $result->response;
        Console::log("filter",$result);
        
        Header::initHeader($dir,"บทความ"); 
        ForumView::initView($dir, $sess, $paths, $top, $api, $forumAll);
        Footer::initFooter($dir); 

   // }else{
       // Nav::gotoHome($dir);
   // }
