<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_teacher($dir, 'teacher_home.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_teacher_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserTeacher()){

        $id = $io->id;
        if($id == NULL) Nav::gotoHome($dir);

            $result = FunTeacherCourse::getSingle($api, $id);
            $courseTeacher = $result->response;

            if($courseTeacher->teacherID == $auth->ID){

            $result = FunCourse::getSingle($api, $courseTeacher->courseID);
            $course = $result->response;

            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(FALSE, 'ระบบการสอน', $dir . App::$pageTeacherPanel),
                new Path(TRUE, 'ประเมินนักเรียน - ' . $course->title, ''),
            );

            Header::initHeader($dir, 'ประเมินนักเรียน - ' . $course->title); 
            TeacherManageStudentView::initView($dir, $paths, $courseTeacher, $course);
            Footer::initFooter($dir); 
        }else{
            Nav::gotoHome($dir);
        }
    }else{
        Nav::gotoHome($dir);
    }
?>
    