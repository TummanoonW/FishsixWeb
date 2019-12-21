<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_view_classroom.php');
    Includer::include_fun($dir, 'fun_classroom.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        $since = $io->get->date;
        $courseID = $io->get->course;
        $branchID = $io->get->branch;
        $classID = $io->get->class;

        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการรายชื่อผู้ลงเรียน', $dir . App::$pageAdminManageClassrooms),
            new Path(TRUE, 'รายชื่อผู้ลงเรียน', '')
        );

        $filter = (object)array(
            'since' => $since,
            'courseID' => $courseID,
            'courseBranchID' => $branchID,
            'classID' => $classID 
        );

        $result = FunClassroom::getSingle($api, $filter);
        $classroom = $result->response;

        Console::log('classroom', $classroom);

        Header::initHeader($dir, "รายชื่อผู้ลงเรียน"); 
        AdminViewClassroom::initView($dir, $sess, $paths, $classroom);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    