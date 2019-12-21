<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_dashboard.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_ownership.php');
    Includer::include_fun($dir, 'fun_dashboard.php');
    Includer::include_fun($dir, 'fun_schedule.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

   if($sess->checkUserExisted()){
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
            new Path(TRUE, 'แดชบอร์ด', $dir . App::$pageDashboard)
        );
        
        $id = $io->id;
        $result = FunOwnership::getSingle($api, $id);
        if($result->success){
            if($result->response != NULL){
                if($result->response->isExpired != TRUE){
                    $ownership = $result->response;
                    
                    $result = FunCourse::get($api, $ownership->courseID);
                    if($result->response != NULL){

                        $result = FunSchedule::getMySchedule($api, $auth->ID);
                        $schedules = $result->response;

                        $result = FunDashboard::getDashboard($api, $id, $auth->ID);
                        $dashboard = $result->response;
                        $course = $dashboard->course;

                    Header::initHeader($dir, "แดชบอร์ด - $course->title"); 
                    DashboardView::initView($dir, $sess, $paths, $ownership, $schedules, $dashboard);
                    Footer::initFooter($dir); 
                }else{
                    $result->err = Err::$ERR_COURSE_EXPIRED;
                    ErrorPage::showError($dir, $result); 
                }
            }else{
                $result->err = Err::$ERR_NO_DATA;
                ErrorPage::showError($dir, $result);
            }
        }else{
            ErrorPage::showError($dir, $result);
        }
        
   }else{
        Nav::gotoHome();
    }
}
?>