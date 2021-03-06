<?php
    //Proto Framework for PHP-HTML5
    //v3
    //Developed by Tummanoon Wacha-em

    $dir = "./";
    include_once $dir . 'includer/includer.php'; //include Includer file to operate
    Includer::include_proto($dir); //include Proto Framework Architecture
    Includer::include_view($dir, 'view_profile.php');
    Includer::include_fun($dir, 'fun_auth.php');

    $sess = new Sess();
    $apiKey = $sess->getAPIKey(); //get secret API Key

    $api = new API($apiKey); //open API connection
    $io = new IO(); //open Input/Output receiver for certain $_GET and $_POST data 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'โปรไฟล์', $dir . App::$pageProfile)
    );

    //check if user already logged in
    if($sess->checkUserExisted()){
        $auth = $sess->getAuth();
        $result = FunAuth::getUserByAuthID($api, $auth->ID);
        $user = $result->response;

        Header::initHeader($dir, $auth->username . " - โปรไฟล์"); //initialize HTML header elements with '<<someone name>> 's Profile' as Title
        ProfileView::initView($dir, $sess, $paths, $auth, $user); //initialize HTML profile elements
        Footer::initFooter($dir); //initialize HTML footer elements
    }else{
        Nav::gotoHome($dir); //return to home page
    }
    
?>
    