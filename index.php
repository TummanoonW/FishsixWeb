<?php

    $dir = './';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_home.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_forum.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API('');
    $io = new IO(); 

    $result = FunCourse::getPublishedLite($api);
    $courses = $result->response;

    $recommended_courses = array();

    $filter = array('limit' => 3, 'offset' => 0);
    $result = FunForum::getFiltered($api, $filter);
    $forums = $result->response;

    Console::log('forums', $forums);

    /*foreach ($courses as $key => $item) {
        if($item->recommended == 1) array_push($recommended_courses, $item);
    }*/

    Header::initHeader($dir, App::$name); 
    HomeView::initView($dir, $sess, $recommended_courses, $courses, $forums);
    Footer::initFooter($dir); 

?>
    