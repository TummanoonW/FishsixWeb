<?php
    //Proto Framework for PHP-HTML5
    //v3
    //Developed by Tummanoon Wacha-em

    $dir = "./";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    Includer::include_proto($dir); //include Proto Framework Architecture
    Includer::include_view($dir, 'view_register.php');

    $auth = Session::getAuth(); //get Logged In user
    $apiKey = Session::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user already logged in
    if(Session::checkUserExisted()){
        Nav::gotoHome();
    }else{
        Header::initHeader($dir, "Register"); //initialize HTML header elements with 'Login' as Title

        RegisterView::initView($dir);

        Footer::initFooter($dir); //initialize HTML footer elements
    }
    



