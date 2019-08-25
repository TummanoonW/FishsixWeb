<?php

    $dir = './';
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_newhome.php');

   

    Header::initHeader($dir, App::$name); 
    HomeView::initView($dir);
    Footer::initFooter($dir); 


 