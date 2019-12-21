<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor_time.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_branch.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API('');
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);

        if($isNew) $add = "เพิ่ม";
        else $add = "แก้ไข";

        if($isNew){
            $sClass = NULL;
        }else{
            $result = FunCourse::getClass($api, $id);
            $sClass = $result->response;
        }

        $result = FunCourse::getBranchesByCourseID($api, $id);
        $branches = $result->response;
        
        $paths = array(
            new Path(FALSE, 'หน้าหลัก',            $dir),
            new Path(FALSE, 'ระบบจัดการ',     $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการคอร์ส',  $dir . App::$pageAdminManageCourses),
            new Path(FALSE, 'โปรแกรมแก้ไขคอร์ส',   Nav::getPrevious()),
            new Path(TRUE,  "$add รอบเรียน",   '')
        );

        Header::initHeader($dir, "แอดมิน - $add รอบเรียน"); 
        AdminCourseEditorTimeView::initView($dir, $sess, $paths, $sClass, $isNew, $branches);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    