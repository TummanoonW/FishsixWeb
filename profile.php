<?php
    //Proto Framework for PHP-HTML5
    //v3
    //Developed by Tummanoon Wacha-em

    include_once './includer/includer.php'; //include Includer file to operate
    Includer::include_proto('./'); //include Proto Framework Architecture
    Includer::include_view('./', 'view_profile.php');

    $auth = Session::getAuth(); //get Logged In user
    $apiKey = Session::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user already logged in
    if(Session::checkUserExisted()){
        Header::initHeader($auth->username . " - Profile"); //initialize HTML header elements with '<<someone name>> 's Profile' as Title

        ProfileView::initView(); //initialize HTML profile elements

        Footer::initFooter(); //initialize HTML footer elements
    }else{
        Nav::gotoHome(); //return to home page
    }
    
?>
    