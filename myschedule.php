<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_myschedule.php');
    Includer::include_fun($dir, 'fun_schedule.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
        new Path(TRUE, 'ตารางเรียน', $dir . App::$pageMySchedule)
    );

   if($sess->checkUserExisted()){
        $result = FunSchedule::getMySchedule($api, $auth->ID);
        $schedules = $result->response;

        Header::initHeader($dir, "ตารางเรียน"); 
        MySchedule::initView($dir, $sess, $paths, $schedules);
        Footer::initFooter($dir); 
   }else{
        Nav::gotoHome();
    }

    