<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', Nav::$rootURL),
        new Path(FALSE, 'Course', $dir . Nav::$pageCourseView),
        new Path(TRUE, 'THE MVC ARCHITECTURAL PATTERN', $dir . Nav::$pageCourseView)
    );

    Header::initHeader($dir,"View Course"); 

    CourseView::initView($dir, $paths);

    Footer::initFooter($dir); 