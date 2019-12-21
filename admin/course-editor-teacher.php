<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor_teacher.php');
    Includer::include_fun($dir, 'fun_teacher.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        $teacherID = $io->id;
        $isNew = ($teacherID == NULL);

        if(!$isNew){
            $result = FunCourse::getTeacher($api, $teacherID);
            $sTeacher = $result->response;
        }else{
            $sTeacher = NULL;
        }

        $result = FunTeacher::get($api);
        $teachers = $result->response;

        if($isNew) $add = 'เพิ่ม';
        else $add = 'แก้ไข';

        $paths = array(
            new Path(FALSE, 'หน้าหลัก',            $dir),
            new Path(FALSE, 'ระบบจัดการ',     $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการคอร์ส',  $dir . App::$pageAdminManageCourses),
            new Path(FALSE, 'โปรแกรมแก้ไขคอร์ส',   Nav::getPrevious()),
            new Path(TRUE,  "$add ครูผู้สอน",   '')
        );

        Header::initHeader($dir, "แอดมิน - $add ครูผู้สอน"); 
        AdminCourseEditorTeacherView::initView($dir, $sess, $paths, $teachers, $sTeacher, $isNew);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    