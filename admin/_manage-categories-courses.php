<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_categories_courses.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการหมวดหมู่', $dir . App::$pageAdminManageCategories),
        new Path(TRUE, 'View Courses', $dir . App::$pageAdminManageCategoriesCourses)
    );

    $pages = array(
        new Path(FALSE, '1', $dir . App::$pageAdminManageCourses . "?page=0"),
        new Path(FALSE, '2', $dir . App::$pageAdminManageCourses . "?page=1"),
        new Path(FALSE, '3', $dir . App::$pageAdminManageCourses . "?page=2")
    );

    if($sess->checkUserAdmin()){
        
        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }
        $pages[$c_page]->active = TRUE;

        Header::initHeader($dir, "Admin - View Course"); 
        AdminManageCategoriesCoursesView::initView($dir, $sess, $paths, $pages);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }