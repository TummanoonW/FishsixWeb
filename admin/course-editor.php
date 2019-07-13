<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_course_editor.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserAdmin()){
        $result = getCourse($io->id);
        if($result->success){
            $course = $result->response;
            Header::initHeader($dir, "Admin - " . $course->title); 
            AdminCourseEditorView::initView($dir, $course);
            Footer::initFooter($dir);
        }else{
            ErrorPage::showError($dir, $result);
        }
    }else{
        Nav::gotoHome();
    }

    function getCourse($id){
        if($id == NULL){
            $course = new Course(NULL);
            $result = new Result();
            $result->setResult(TRUE, $course, NULL);
            return $result;
        }else{
            //real
            /*$query = new StdClass();
            $query->ID = $id;
            $url = $api->getURL(API::$apiCourse, 'getSingle', $query);
            $result = $api->get($url);
            return $result;*/

            //mock
            $course = new Course(NULL);
            $course->title = "Easy Chinese 101";
            $result = new Result();
            $result->setResult(TRUE, $course, NULL);
            return $result;
        }
    }
?>
    