<?php
    //Proto Framework for PHP-HTML5
    //v3
    //Developed by Tummanoon Wacha-em
    
    $dir = "./"; //current directory
    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    Includer::include_proto($dir); //include Proto Framework Architecture
    Includer::include_view($dir, 'view_forgotpassword.php');

    $auth = SESSION::getAuth(); //get Logged In user
    $apiKey = SESSION::getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    //check if user already logged in
    if(SESSION::checkUserExisted()){
        Nav::gotoHome($dir); //go to Profile page
    }else{
        Header::initHeader($dir, "ลืมรหัสผ่าน"); //initialize HTML header elements with 'Login' as Title

        if($io->method == 'show'){
            ForgotPasswordView::initView($dir, TRUE); //initialize HTML login elements
        }else{
            ForgotPasswordView::initView($dir, FALSE); //initialize HTML login elements    
        }

        Footer::initFooter($dir); //initialize HTML footer elements
    }
    



