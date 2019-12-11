<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_myschedule.php');
    Includer::include_fun($dir, 'fun_schedule.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
        new Path(TRUE, 'ตารางเรียน', $dir . App::$pageMySchedule)
    );

   if(SESSION::checkUserExisted()){
        $result = FunSchedule::getMySchedule($api, $auth->ID);
        $schedules = $result->response;

        Header::initHeader($dir, "ตารางเรียน"); 
        MySchedule::initView($dir, $paths, $schedules);
        Footer::initFooter($dir); 
   }else{
        Nav::gotoHome();
    }

    