<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_courses.php');
    Includer::include_fun($dir, 'fun_admin_course.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_category.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home', $dir),
        new Path(FALSE, 'Admin Panel', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'Manage Courses', $dir . App::$pageAdminManageCourses)
    );

    if(Session::checkUserAdmin()){
        
        if(!isset($io->query->query)) $search = (object)array(
            'category' => '',
            'public' => '',
            'query' => '',
            'orderBy' => 'course',
            'desc' => FALSE,
            'limit' => 20,
            'offset' => 0
        );
        else $search = $io->query;
        
        $limit = $search->limit;

        $result = FunAdminCourse::countFiltered($api, $search);
        $count = $result->response;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $pages = Path::genPages($dir, App::$pageAdminManageCourses, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        $offset = ($c_page * $limit);        
        $search->offset = $offset;

        $result = FunAdminCourse::getFiltered($api, $search);
        $courses = $result->response;

        $result = FunCategory::get($api);
        $categories = $result->response;

        Header::initHeader($dir, "Admin - Manage Courses"); 
        AdminManageCoursesView::initView($dir, $paths, $pages, $courses, $count, $search, $categories);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    