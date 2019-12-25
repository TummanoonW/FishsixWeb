<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_browsecourses.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(TRUE, 'All Courses', $dir . App::$pageBrowseCourses)
    );

    $pages = array(
        new Path(FALSE, '1', $dir . App::$pageBrowseCourses . "?page=0"),
        new Path(FALSE, '2', $dir . App::$pageBrowseCourses . "?page=1"),
        new Path(FALSE, '3', $dir . App::$pageBrowseCourses . "?page=2")
    );

    if($sess->checkUserExisted()){

        Header::initHeader($dir," All Courses"); 

        BrowseCoursesView::initView($dir, $sess, $paths, $pages);

        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
