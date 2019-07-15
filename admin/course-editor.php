<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path('Home', Nav::$rootURL),
        new Path('Admin Panel', $dir . Nav::$pageAdminPanel),
        new Path('Manage Courses', $dir . Nav::$pageAdminManageCourses),
        new Path('Course Editor', $dir . Nav::$pageAdminCourseEditor)
    );

    if(Session::checkUserAdmin()){
        $result = FunCourse::getCourse($io->id);
        if($result->success){
            $course = $result->response;

            $categories = FunCategory::getAll($api);

            Header::initHeader($dir, "Admin - " . $course->title); 
            AdminCourseEditorView::initView($dir, $paths, $course, $categories);
            Footer::initFooter($dir);
        }else{
            ErrorPage::showError($dir, $result);
        }
    }else{
        Nav::gotoHome();
    }




?>
    