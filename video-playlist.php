<?php
    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_video_playlist.php');
    Includer::include_fun($dir, 'fun_ownership.php');
    Includer::include_fun($dir, 'fun_video_lib.php');
    Includer::include_fun($dir, 'fun_category.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserExisted()){
        $id = $io->id;

        if($sess->checkUserAdmin() || $sess->checkUserTeacher()){ 
            $isAllowed = TRUE;
        }else{
            $isAllowed = ($auth->unlockVidLib == TRUE);
        }

        if($isAllowed){
            $result = FunCategory::getSingle($api, $id);
            $category = $result->response;

            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(FALSE, "คลังวิดีโอ - " . App::$name, Nav::getURL($dir, App::$pageVideoLibrary)),
                new Path(TRUE, "เพลยลิสต์ - " . $category->title, '')
            );

            $result = FunVideoLib::getByCategoryID($api, $id);
            $videos = $result->response; 
        }else{
            $category = NULL;
            $videos = array();
        }

        Console::log('category', $category);
        Console::log('videos', $videos);

        Header::initHeader($dir, "เพลย์เลิสต์ - " . $category->title); 
        VideoPlaylistView::initView($dir, $sess, $paths, $category, $videos, $isAllowed);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
