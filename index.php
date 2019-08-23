<?php

    $dir = './';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_home.php');

    Includer::include_fun($dir, 'fun_category.php');
    Includer::include_fun($dir, 'fun_course.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $pages = array(
        new Path(FALSE, '1', $dir . "?page=0"),
        new Path(FALSE, '2', $dir . "?page=1"),
        new Path(FALSE, '3', $dir . "?page=2"),
        new Path(FALSE, '4', $dir . "?page=3"),
        new Path(FALSE, '5', $dir . "?page=4"),
        new Path(FALSE, '6', $dir . "?page=5")
    );

    if(Session::checkUserExisted()){

      if($io->page == NULL){
        $c_page = 0;
    }else{
        $c_page = $io->page;
    }
    $pages[$c_page]->active = TRUE;

    Header::initHeader($dir, App::$name); 
    HomeView::initView($dir, $pages);
    Footer::initFooter($dir); 

    }else{
        Header::initHeader($dir, App::$name); 
        HomeView::initView($dir, $pages);
        Footer::initFooter($dir); 
    }

 //   $categories = FunCategory::getAll($api);

//    if(isset($io->query->limit)) $limit = $io->query->limit;
  //  else $limit = 20;

//    if($io->page != NULL) $c_page = $io->page;
//    else $c_page = 0;

//    $offset = ($c_page * $limit);        
//    $filter = new StdClass();
//    $filter->limit = $limit;
//    $filter->offset = $offset;

  //  $count_courses = FunCourse::countCourses($api);
//    if($count_courses->success) $c_courses = $count_courses->response;
//    else $c_courses = 0;
    
//    $pages = genPages($dir, $limit, $c_page, $c_courses);

//    $result = FunCourse::getCoursesFilter($api, $filter);
//    $courses = $result->response;

//    Header::initHeader($dir, App::$name); 
//    HomeView::initView($dir, $pages, $courses, $categories);
//    Footer::initFooter($dir); 



//    function genPages($dir, $limit, $c_page, $c_courses){
//        $pages = array();

//        $mark = 0;
//        $count = 0;
//        do {
//            array_push($pages, new Path(($c_page == $count), $count, $dir . App::$pageAdminManageCourses . '?page=' . $count));

//            $count = $count + 1;
//            $mark = $mark + $limit;
//        } while ($c_courses > $mark);

//        return $pages;
//    }

    