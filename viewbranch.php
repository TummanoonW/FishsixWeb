<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_branch.php');

    Includer::include_fun($dir, 'fun_branch.php');

    $auth = Session::getAuth(); 
    $apiKey = Session::getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($io->id != NULL){
        $id = $io->id;
        $result = FunBranch::getSingle($api, $id);
        $branch = $result->response;

        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(TRUE, $branch->title, '')
        );

        Header::initHeader($dir, $branch->title); 
        ViewBranch::initView($dir, $paths, $branch);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }

