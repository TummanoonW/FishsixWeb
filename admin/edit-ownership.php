<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_ownership.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_ownership.php');

    $sess = new Sess();
    $auth = $sess->getAuth();
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);
        if($isNew) $label = 'เพิ่ม';
        else $label = 'แก้ไข';
    
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการความเป็นเจ้าของ', $dir . App::$pageAdminManageOwnerships),
            new Path(TRUE, "โปรแกรม" . $label . "ความเป็นเจ้าของ", '')
        );

        if($isNew){
            $ownership = new StdClass();
        }else{
            $result = FunOwnership::getSingle($api, $id);
            $ownership = $result->response;
        }

        $result = FunCourse::getPublishedLite($api);
        $courses = $result->response;

        Header::initHeader($dir, "แอดมิน - โปรแกรม" . $label . "ความเป็นเจ้าของ"); 
        AdminOwnershipEditorView::initView($dir, $sess, $paths, $isNew, $label, $ownership, $courses);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    