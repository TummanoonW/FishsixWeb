<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_myschedule.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
        new Path(FALSE, 'จองรอบเรียน', $dir . App::$pageBookClass),
        new Path(TRUE, 'ตารางการจอง', $dir . App::$pageMySchedule)
    );

   if(Session::checkUserExisted()){
        Header::initHeader($dir,"ตารางการจอง"); 
        MySchedule::initView($dir, $paths);
        Footer::initFooter($dir); 
    
   }else{
        Nav::gotoHome();
    }

    