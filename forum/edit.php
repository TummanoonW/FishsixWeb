<?php

    $dir = "../";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_forum($dir, 'view_edit.php');
    Includer::include_fun($dir, 'fun_forum.php');
    Includer::include_fun($dir, 'fun_category.php');

 
   
    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 
    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin() || $sess->checkUserTeacher()){
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'บทความ', $dir . App::$pageForums),
            new Path(FALSE, 'บทความของฉัน', $dir . App::$pageMyForums),
            new Path(TRUE, 'แก้ไขบทความ', '')
        );

        $result = FunCategory::get($api);
        $catagories = $result->response;
        Console::log('cat', $catagories);

        if(isset($io->id)){
            $isNew = FALSE;
            $label = "แก้ไข";
            $result = FunForum::getSingle($api, $io->id);
            $forum = $result->response;
        }else{
            $isNew = TRUE;
            $label = "เพิ่ม";
            $forum = new StdClass();
        }

        Header::initHeader($dir, "$label บทความ"); 
        EditForumView::initView($dir, $sess, $paths, $forum, $isNew, $label, $catagories);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
