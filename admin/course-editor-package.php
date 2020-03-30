<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor_package.php');
    Includer::include_fun($dir, 'fun_course.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        $index = $io->get->index;
        $isNew = ($index == NULL);

        if($isNew){
            $add = "เพิ่ม";
            $sPackage = NULL;
            $index = NULL;
        }else{
            $add = "แก้ไข";
            $sPackage = NULL;
        }

        $paths = array(
            new Path(FALSE, 'หน้าหลัก',            $dir),
            new Path(FALSE, 'ระบบจัดการ',     $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการคอร์ส',  $dir . App::$pageAdminManageCourses),
            new Path(FALSE,  'โปรแกรมแก้ไขคอร์ส',   Nav::getPrevious()),
            new Path(TRUE,  "$add ชุดราคา",   '')
        );

        Header::initHeader($dir, "แอดมิน - $add ชุดราคา"); 
        AdminCourseEditorPackageView::initView($dir, $sess, $paths, $sPackage, $isNew, $index);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    