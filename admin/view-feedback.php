<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_view_feedback.php');
    Includer::include_fun($dir, 'fun_feedback.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        $id = $io->id;

        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการรายงานข้อผิดพลาด', $dir . App::$pageAdminManageFeedbacks),
            new Path(TRUE, 'ข้อผิดพลาด - ' . $id, '')
        );

        $result = FunFeedback::getSingleFull($api, $id);
        $feedback = $result->response;

        Header::initHeader($dir, "ข้อผิดพลาด - $id"); 
        AdminViewFeedback::initView($dir, $sess, $paths, $feedback);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    