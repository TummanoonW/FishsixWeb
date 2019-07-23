<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_admin_course.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'Home',            Nav::$rootURL),
        new Path(FALSE, 'Admin Panel',     $dir . Nav::$pageAdminPanel),
        new Path(FALSE, 'Manage Courses',  $dir . Nav::$pageAdminManageCourses),
        new Path(TRUE,  'Course Editor',   $dir . Nav::$pageAdminCourseEditor)
    );

    if(Session::checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);

        $categories = FunCategory::getAll($api);

        if($isNew){ //new course
            $course = new Course(NULL);
            Header::initHeader($dir, "Admin - " . $course->title); 
            AdminCourseEditorView::initView($dir, $paths, $course, $categories);
            Footer::initFooter($dir);
        }else{ //edit course
            $result = FunCourse::getCourse($api, $io->id);
            if($result->success){
                $course = $result->response;

                Header::initHeader($dir, "Admin - " . $course->title); 
                AdminCourseEditorView::initView($dir, $paths, $course, $categories);
                Footer::initFooter($dir);
            }else{
                ErrorPage::showError($dir, $result);
            }
        }
    }else{
        Nav::gotoHome();
    }




?>
    