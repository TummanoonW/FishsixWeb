<?php

    $dir = './';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_home.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $pages = array(
        new Path(FALSE, '1', $dir . Nav::$rootURL . "?page=0"),
        new Path(FALSE, '2', $dir . Nav::$rootURL . "?page=1"),
        new Path(FALSE, '3', $dir . Nav::$rootURL . "?page=2"),
        new Path(FALSE, '4', $dir . Nav::$rootURL . "?page=3"),
        new Path(FALSE, '5', $dir . Nav::$rootURL . "?page=4"),
        new Path(FALSE, '6', $dir . Nav::$rootURL . "?page=5")
    );

    if($io->page == NULL){
        $c_page = 0;
    }else{
        $c_page = $io->page;
    }
    $pages[$c_page]->active = TRUE;

    Header::initHeader($dir, App::$name); 

    HomeView::initView($dir, $pages);
    
    Footer::initFooter($dir); 
?>
    