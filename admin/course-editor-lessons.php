<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor_lessons.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = SESSION::getAuth(); 
    $apiKey = SESSION::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(SESSION::checkUserAdmin()){

        $id = $io->id;
        $isNew = ($id == NULL);

        if($isNew){
            $add = 'เพิ่ม';
            $sLesson = NULL;
        }else{
            $add = 'แก้ไข';
            $result = FunCourse::getLesson($api, $id);
            $sLesson = $result->response;
        }
        
        $paths = array(
            new Path(FALSE, 'หน้าหลัก',            $dir),
            new Path(FALSE, 'ระบบจัดการ',     $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการคอร์ส',  $dir . App::$pageAdminManageCourses),
            new Path(FALSE,  'โปรแกรมแก้ไขคอร์ส',   Nav::getPrevious()),
            new Path(TRUE,  "$add บทเรียน",   '')
        );

        Header::initHeader($dir, "แอดมิน - $add บทเรียน"); 
        AdminCourseEditorLessonView::initView($dir, $paths, $sLesson, $isNew);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    