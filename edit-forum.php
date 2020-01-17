<?php

    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_editforum.php');
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_category.php');

 
   
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(TRUE, 'แก้ไขบทความ', '')
    );

    if($sess->checkUserAdmin() || $sess->checkUserTeacher()){
        $result = FunCategory::get($api);
        $catagory = $result->response;
        $id= $io->id;
        $result = FunForum::getSingle($api, $id);
        $form->ID = $result->response->ID;
        $form->authorID = $result->response->authorID;
        $form->categoryID = $result->response->categoryID;
        $form->tags = $result->response->tags ;
        $form->thumbnail  = $result->response->thumbnail;
        $form->title = "Test";
        $form->content = $result->response->content;
        $form->views = $result->response->views;
        $form->isSpam = $result->response->isSpam;
        $form->date = $result->response->date;
        $form->comment = $result->response->comment;
        Header::initHeader($dir,"แก้ไขบทความ"); 
        EditForumView::initView($dir, $sess, $paths, $api, $form);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
