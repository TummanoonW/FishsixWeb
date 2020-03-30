<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_classrooms.php');
    Includer::include_fun($dir, 'fun_classroom');
    Includer::include_fun($dir, 'fun_course');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $auth =  $sess->getAuth();

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการรายชื่อผู้ลงเรียน', '')
    );

    if($auth->type == 'admin' || $auth->type == 'editor'){
        $filter = $io->query;

        if(!isset($filter->since)){
            /*$now = CustomDate::getDateNow();
            $month_earlier = $now->modify('-1 year');
            $filter->since = CustomDate::parseDate($month_earlier);
            $filter->since = explode(' ', $filter->since)[0];*/
            //$filter->since = "";
        }

        if(!isset($filter->courseID)){ 
            $filter->courseID = "";
            $branches = [];
            $classes = [];
        }else{
            $result = FunCourse::getBranchesByCourseID($api, $filter->courseID);
            $branches = $result->response;

            $result = FunCourse::getClassesByCourseID($api, $filter->courseID);
            $classes = $result->response;
        }

        if(!isset($filter->courseBranchID)){
            $filter->courseBranchID = "";
        }else{
            $n_classes = array();
            foreach ($classes as $key => $value) {
                if($filter->courseBranchID == $value->courseBranchID){
                    array_push($n_classes, $value);
                }
            }
            $classes = $n_classes;
        }

        if(!isset($filter->classID)){
            $filter->classID = "";
        }

        $result = FunClassroom::getFiltered($api, $filter);
        $classrooms = $result->response;

        $result = FunCourse::getAllLite($api);
        $courses = $result->response;

        Console::log('filter', $filter);
        Console::log('branches', $branches);
        Console::log('classes', $classes);
        Console::log('courses', $courses);
        Console::log('classrooms', $classrooms);

        Header::initHeader($dir, "แอดมิน - จัดการรายชื่อผู้ลงเรียน"); 
        AdminManageClassroomsView::initView($dir, $sess, $paths, $classrooms, $filter, $courses, $branches, $classes);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    