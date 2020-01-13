<?php
    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_video.php');
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
            $result = FunVideoLib::getSingle($api, $id);
            $video = $result->response;
            
            $result = FunCategory::getSingle($api, $id);
            $category = $result->response;

            $paths = array(
                new Path(FALSE, 'หน้าหลัก', $dir),
                new Path(FALSE, "คลังวิดีโอ - " . App::$name, Nav::getURL($dir, App::$pageVideoLibrary)),
                new Path(FALSE, "เพลยลิสต์ - " . $category->title, Nav::getURL($dir, App::$pageVideoPlaylist . "?id=$video->categoryID")),
                new Path(TRUE, $video->title, '')
            );

        }else{
            $video = NULL;
        }

        Console::log('category', $category);
        Console::log('video', $video);

        Header::initHeader($dir, $video->title); 
        VideoView::initView($dir, $sess, $paths, $category, $video, $isAllowed);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }
