<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor_package.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);

        if($isNew){
            $add = "เพิ่ม";
            $sPackage = NULL;
        }else{
            $add = "แก้ไข";
            $result = FunCourse::getPackage($api, $id);
            $sPackage = $result->response;
        }

        $paths = array(
            new Path(FALSE, 'หน้าหลัก',            $dir),
            new Path(FALSE, 'ระบบจัดการ',     $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการคอร์ส',  $dir . App::$pageAdminManageCourses),
            new Path(FALSE,  'โปรแกรมแก้ไขคอร์ส',   Nav::getPrevious()),
            new Path(TRUE,  "$add ชุดราคา",   '')
        );

        Header::initHeader($dir, "แอดมิน - $add ชุดราคา"); 
        AdminCourseEditorPackageView::initView($dir, $paths, $sPackage, $isNew);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    