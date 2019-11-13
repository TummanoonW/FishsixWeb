<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_mycourses.php');
    Includer::include_fun($dir, 'fun_course.php');
    Includer::include_fun($dir, 'fun_ownership.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if(Session::checkUserExisted()){
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(TRUE, 'คอร์สของฉัน', $dir . App::$pageMyCourses)
        );

        $result = FunOwnership::countByOwnerID($api, $auth->ID);
        $count = $result->response;

        if($io->page == NULL) $c_page = 0;
        else $c_page = $io->page;

        $limit = 12;
        $offset = ($c_page * $limit);

        $pages = genPages($dir, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;

        $result = FunCourse::getWhatIOwned($api, $auth->ID, $limit, $offset);
        $ownerships = $result->response;

        Header::initHeader($dir, $auth->username . " - คอร์สของฉัน"); 
        MyCoursesView::initView($dir, $paths, $pages, $ownerships);
        Footer::initFooter($dir);
    }else{
        Nav::gotoHome($dir);
    }


    function genPages($dir, $limit, $c_page, $count){
        $pages = array();

        $mark = 0;
        $count = 0;
        do {
            array_push($pages, new Path(($c_page == $count), $count, $dir . App::$pageMyCourses . "?page=" . $count));

            $count = $count + 1;
            $mark = $mark + $limit;
        } while ($count > $mark);

        return $pages;
    }
