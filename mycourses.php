<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_mycourses.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', Nav::$rootURL),
        new Path(TRUE, 'My Courses', $dir . Nav::$pageMyCourses)
    );

    $pages = array(
        new Path(FALSE, '1', $dir . Nav::$pageMyCourses . "?page=1"),
        new Path(FALSE, '2', $dir . Nav::$pageMyCourses . "?page=2"),
        new Path(FALSE, '3', $dir . Nav::$pageMyCourses . "?page=3"),
    );

    if(Session::checkUserExisted()){

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }
        $pages[$c_page]->active = TRUE;

        Header::initHeader($dir, $auth->username . " - My Courses"); 

        MyCoursesView::initView($dir, $paths, $pages);

        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome();
    }
