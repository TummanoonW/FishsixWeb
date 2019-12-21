<?php

    $dir = './';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_home.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_course.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    /*$result = FunCategory::get($api);
    $categories = $result->response;
    
    if(!isset($io->query->search))
    if(isset($_GET['search'])) $io->query->search = $_GET['search'];
    else $io->query->search = "";
    if(!isset($io->query->desc)) $io->query->desc = FALSE;
    if(!isset($io->query->sort)) $io->query->sort = 'char';
    if(!isset($io->query->category)) $io->query->category = '';
    if(!isset($io->query->limit)) $io->query->limit = 20;

    if($io->page != NULL) $c_page = $io->page;
    else $c_page = 0;

    $offset = ($c_page * $io->query->limit);        
    $io->query->offset = $offset;

    $query2 = (array)$io->query;
    unset($query2['limit']);
    unset($query2['offset']);
    $result = FunCourse::countFilteredPublished($api, $query2);
    $countTotal = $result->response;

    $pages = genPages($dir, $io->query->limit, $c_page, $countTotal);

    $result = FunCourse::getFilteredPublished($api, $io->query);
    $courses = $result->response;*/

    $result = FunCourse::getPublishedLite($api);
    $courses = $result->response;

    $recommended_courses = array();
    $all_courses = array();

    foreach ($courses as $key => $item) {
        if($item->recommended == 1) array_push($recommended_courses, $item);
    }

    Header::initHeader($dir, App::$name); 
    HomeView::initView($dir, $sess, $recommended_courses, $courses);
    Footer::initFooter($dir); 

    /*function genPages($dir, $limit, $c_page, $c_courses){
        $pages = array();

        $mark = 0;
        $count = 0;
        do {
            array_push($pages, new Path(($c_page == $count), $count, $dir . App::$pageAdminManageCourses . '?page=' . $count));

            $count = $count + 1;
            $mark = $mark + $limit;
        } while ($c_courses > $mark);

        return $pages;
    }*/

    