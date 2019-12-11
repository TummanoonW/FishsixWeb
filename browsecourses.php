<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_browsecourses.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

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

    if(SESSION::checkUserExisted()){

        Header::initHeader($dir," All Courses"); 

        BrowseCoursesView::initView($dir, $paths, $pages);

        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
