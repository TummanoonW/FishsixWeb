<?php

    $dir = './';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_home.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $result = FunCourse::getPublishedLite($api);
    $courses = $result->response;

    $recommended_courses = array();
    $all_courses = array();

    foreach ($courses as $key => $item) {
        if($item->recommended == 1) array_push($recommended_courses, $item);
    }

    Header::initHeader($dir, App::$name); 
    HomeView::initView($dir, $recommended_courses, $courses);
    Footer::initFooter($dir); 

?>
    