<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_teacher($dir, 'teacher_home.php');
    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_teacher_course.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'ระบบการสอน', $dir . App::$pageTeacherPanel)
    );

    if(SESSION::checkUserTeacher()){

        $result = FunCategory::get($api);
        $categories = $result->response;

        $result = FunTeacherCourse::getByTeacherID($api, $auth->ID);
        $items = $result->response;

        Console::log('items', $items);

        Header::initHeader($dir, App::$name . " - ระบบการสอน"); 
        TeacherHomeView::initView($dir, $paths, $items, $categories);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
?>
    