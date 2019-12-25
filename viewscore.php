<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_score.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_ownership.php');
    Includer::include_fun($dir, 'fun_dashboard.php');
    Includer::include_fun($dir, 'fun_schedule.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

   if($sess->checkUserExisted()){
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'คอร์สของฉัน', $dir . App::$pageMyCourses),
            new Path(FALSE, 'แดชบอร์ด', $dir . App::$pageDashboard),
            new Path(TRUE, 'ดูคะแนน', '')
        );
        
        $id = $io->id;
        $result = FunDashboard::getScore($api, $id, $auth->ID);
        if($result->success){
            if($result->response != NULL){
                $score = $result->response;
                $course = $score->course;

                Header::initHeader($dir, "ดูคะแนน - $course->title"); 
                ScoreView::initView($dir, $sess, $paths, $score, $course);
                Footer::initFooter($dir); 
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

?>