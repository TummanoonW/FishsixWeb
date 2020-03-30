<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_analytics($dir, 'analytics_home.php');
    Includer::include_fun($dir, 'fun_branch.php');
    Includer::include_fun($dir, 'fun_course.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'Analytics', $dir . App::$pageAnalytics)
    );

    if($sess->checkUserAdmin()){

        $result = FunBranch::getLite($api);
        $branches = $result->response;

        $result = FunCourse::getAllLite($api);
        $courses = $result->response;

        Header::initHeader($dir, App::$name . " - Analytics"); 
        AnalyticsHomeView::initView($dir, $sess, $paths, $branches, $courses);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
?>
    