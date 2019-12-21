<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_teacher($dir, 'teacher_manage_students.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_teacher_course.php');
    Includer::include_fun($dir, 'fun_teacher_student.php');


    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserTeacher()){

        $id = $io->id;
        if($id == NULL) Nav::gotoHome($dir);

            $result = FunTeacherCourse::getSingle($api, $id);
            $courseTeacher = $result->response;

            if($courseTeacher->teacherID == $auth->ID){

            $result = FunCourse::get($api, $courseTeacher->courseID);
            $course = $result->response;

            $result = FunCourse::getBranchesByCourseID($api, $course->ID);
            $branches = $result->response;

            $result = FunCourse::getClassesByCourseID($api, $course->ID);
            $classes = $result->response;

            Console::log('courseTeacher', $courseTeacher);
            Console::log('course', $course);
            Console::log('branches', $branches);
            Console::log('classes', $classes);

            $search = $io->query;
            if(!isset($search->courseBranchID))$search->courseBranchID = "";
            if(!isset($search->classID))$search->classID = "";
            if(!isset($search->courseID))$search->courseID = $course->ID;
            if(!isset($search->startDate))$search->startDate = "";
            /*
                {
                    "student": "",
                    "branch": "",
                    "class": "",
                    "limit": 25,
                    "offset": 0                }
            */

            $result = FunTeacherStudent::getMyStudentsFiltered($api, $search);
            $students = $result->response;

            Console::log('students', $students);

            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(FALSE, 'ระบบการสอน', $dir . App::$pageTeacherPanel),
                new Path(TRUE, 'ประเมินนักเรียน - ' . $course->title, ''),
            );

            Header::initHeader($dir, 'ประเมินนักเรียน - ' . $course->title); 
            TeacherManageStudentView::initView($dir, $sess, $paths, $id, $courseTeacher, $course, $branches, $classes, $students, $search);
            Footer::initFooter($dir); 
        }else{
            Nav::gotoHome($dir);
        }
    }else{
        Nav::gotoHome($dir);
    }
?>
    