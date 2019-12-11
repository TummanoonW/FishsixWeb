<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_course.php');

    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_teacher.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($io->id != NULL){
        $id = $io->id;
        $result = FunCourse::getFull($api, $id);
        if($result->success){
            $course = $result->response;

            $result = FunTeacher::getByCourseID($api, $id);
            $teachers = $result->response;

            $result = FunCourse::getComments($api, $id, 5, 0);
            $comments = $result->response;

            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(FALSE, 'คอร์ส', $dir . App::$pageCourseView),
                new Path(TRUE, $course->title, '')
            );

            Header::initHeader($dir, $course->title); 
            CourseView::initView($dir, $paths, $course, $teachers, $comments);
            Footer::initFooter($dir); 
        }else{
            ErrorPage::showError($dir, $result);
        }
    }else{
        Nav::gotoHome($dir);
    }

