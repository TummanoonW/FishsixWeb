<?php

    $dir = "../";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_forum($dir, 'view_home.php');
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_auth.php');
 
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserExisted()){

        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'บทความ', $dir . App::$pageForums),
            new Path(TRUE, 'บทความของฉัน', '')
        );

        $result = FunForum::getMy($api, $auth->ID);
        $forums = $result->response;

        Console::log('count', $count);
        Console::log('all', $forums);

        Header::initHeader($dir, "บทความของฉัน"); 
        MyForumsView::initView($dir, $sess, $paths, $forums);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }

