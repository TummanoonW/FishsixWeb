<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_teacher($dir, 'teacher_home.php');
    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_teacher_course.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'ระบบการสอน', $dir . App::$pageTeacherPanel)
    );

    if($sess->checkUserTeacher()){

        $result = FunCategory::get($api);
        $categories = $result->response;

        $result = FunTeacherCourse::getByTeacherID($api, $auth->ID);
        $items = $result->response;

        Console::log('items', $items);

        Header::initHeader($dir, App::$name . " - ระบบการสอน"); 
        TeacherHomeView::initView($dir, $sess, $paths, $items, $categories);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
?>
    