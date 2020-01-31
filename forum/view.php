<?php

    $dir = "../";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_forum($dir, 'view_forum.php');
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_auth.php');
  
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $api = new API($apiKey);
    $io = new IO(); 

    $id = $io->id;
    
    $result = FunForum::getSingle($api, $id);
    $forum = $result->response;

    $result = FunForum::getCommentsByForumID($api, $id);
    $comments = $result->response;

    Console::log("forum", $forum);
    Console::log("comments", $comments);

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'บทความ', $dir . App::$pageForums),
        new Path(TRUE, "บทความ - " . $forum->title, '')
    );

    Header::initHeader($dir, "บทความ - " . $forum->title); 
    ForumSingleView::initView($dir, $sess, $paths, $api, $forum, $comments);
    Footer::initFooter($dir); 
