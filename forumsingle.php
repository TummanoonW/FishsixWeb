<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_forumsingle.php');
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_auth.php');

 
   
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
       $id= $io->id;
        

        $result = FunForum::getSingle($api, $id);
        $forumSingle = $result->response;
       Console::log("asd",$forumSingle);
        Header::initHeader($dir,"รายละเอียดบทความ"); 
        ForumSingleView::initView($dir, $sess, $paths, $api, $forumSingle);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
