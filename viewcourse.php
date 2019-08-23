<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_course.php');

    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_category.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(TRUE, 'HTML and CSS (Sample Courses title)', $dir . App::$pageCourseView)
    );

    if(Session::checkUserExisted()){

        Header::initHeader($dir,"HTML and CSS (Sample Courses title)"); 

        CourseView::initView($dir, $paths);

        Footer::initFooter($dir); 

    }else{
       // Nav::gotoHome($dir);
       Header::initHeader($dir,"HTML and CSS (Sample Courses title)"); 

       CourseView::initView($dir, $paths);

       Footer::initFooter($dir); 
    }

//    if($io->id != NULL){
//        $result = FunCourse::getCourse($api, $io->id);

//        if($result->success){
//            $course = $result->response;

//            $paths = array(
//                new Path(FALSE, 'Home', $dir),
//                new Path(FALSE, 'Course', $dir . App::$pageCourseView),
//                new Path(TRUE, $course->title, $dir . App::$pageCourseView . "?id=" . $io->id)
//            );

//            Header::initHeader($dir, $course->title); 
//            CourseView::initView($dir, $paths, $course);
//            Footer::initFooter($dir); 
//        }else{
//            ErrorPage::showError($dir, $result);
//        }
//    }else{
//        Nav::gotoHome($dir);
//    }

