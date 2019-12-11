<?php
    //Proto Framework for PHP-HTML5
    //v3
    //Developed by Tummanoon Wacha-em

    $dir = "./";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    Includer::include_proto($dir); //include Proto Framework Architecture
    Includer::include_view($dir, 'view_register.php');

    $auth = SESSION::getAuth(); //get Logged In user
    $apiKey = SESSION::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user already logged in
    if(SESSION::checkUserExisted()){
        Nav::gotoHome($dir);
    }else{
        Header::initHeader($dir, "สมัครสมาชิก"); //initialize HTML header elements with 'Login' as Title
        RegisterView::initView($dir);
        Footer::initFooter($dir); //initialize HTML footer elements
    }
    



