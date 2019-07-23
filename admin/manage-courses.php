<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_courses.php');
    Includer::include_fun($dir, 'fun_admin_course.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', App::$rootURL),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'Manage Courses', $dir . App::$pageAdminManageCourses)
    );

    if(Session::checkUserAdmin()){
        if(isset($io->query->limit)) $limit = $io->query->limit;
        else $limit = 20;

        if($io->page != NULL) $c_page = $io->page;
        else $c_page = 0;

        $offset = ($c_page * $limit);        
        $filter = new StdClass();
        $filter->limit = $limit;
        $filter->offset = $offset;

        $count_courses = FunCourse::countCourses($api);
        if($count_courses->success) $c_courses = $count_courses->response;
        else $c_courses = 0;
        
        $pages = genPages($dir, $limit, $c_page, $c_courses);

        $result = FunCourse::getCoursesFilter($api, $filter);
        $courses = $result->response;

        Header::initHeader($dir, "Admin - Manage Courses"); 
        AdminManageCoursesView::initView($dir, $paths, $pages, $courses);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome();
    }

    function genPages($dir, $limit, $c_page, $c_courses){
        $pages = array();

        $mark = 0;
        $count = 0;
        do {
            array_push($pages, new Path(($c_page == $count), $count, $dir . App::$pageAdminManageCourses . '?page=' . $count));

            $count = $count + 1;
            $mark = $mark + $limit;
        } while ($c_courses > $mark);

        return $pages;
    }
?>
    