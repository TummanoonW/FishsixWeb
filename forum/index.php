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

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'บทความ', '')
    );

    if($io->page == NULL)$c_page = 0;
    else $c_page = $io->page;

    $limit = 20;
    $offset = ($c_page * $limit);

    $filter = (object)array(
         'limit' => $limit,
         'offset' => $offset
    );

    $result = FunForum::countFiltered($api, (object)array());
    $count = $result->response;

    $pages = Path::genPages($dir, App::$pageForums, $limit, $c_page, $count);

    $result = FunForum::getTop($api, 5);
    $forumTop = $result->response;

    $result = FunForum::getFiltered($api, $filter);
    $forums = $result->response;

    Console::log('count', $count);
    Console::log('top', $forumTop);
    Console::log('all', $forums);
    
    Header::initHeader($dir,"บทความ"); 
    ForumsView::initView($dir, $sess, $paths, $pages, $forumTop, $forums, $count);
    Footer::initFooter($dir); 

