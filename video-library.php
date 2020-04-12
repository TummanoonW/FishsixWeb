<?php
    $dir = "./";
    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_view($dir, 'view_video_library.php');
    Includer::include_fun($dir, 'fun_ownership.php');
    Includer::include_fun($dir, 'fun_video_lib.php');
    Includer::include_fun($dir, 'fun_video_his.php');
    Includer::include_fun($dir, 'fun_category.php');

    $sess = new Sess(); 
    $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API('any');
    $io = new IO(); 

    if($sess->checkUserExisted()){
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(TRUE, "คลังวิดีโอ - " . App::$name, '')
        );

        if($sess->checkUserAdmin() || $sess->checkUserTeacher()){ 
            $isAllowed = TRUE;
        }else{
            $isAllowed = ($auth->unlockVidLib == TRUE);
        }

        if($isAllowed){
            $result = FunCategory::get($api);
            $categories = $result->response;

            foreach ($categories as $key => $value) {
                $result = FunVideoLib::getByCategoryIDLimit($api, $value->ID, 3);
                $videos = $result->response;
                $value->videos = $videos;
            }

            $result = FunVideoLib::getLatestLimit($api, 5);
            $latest = $result->response; 
        }else{
            $categories = array();
            $latest = array();
        }

        Console::log('categories', $categories);
        Console::log('latest', $latest);

        Header::initHeaderSKRN($dir, "คลังวิดีโอ - " . App::$name); 
        VideoLibraryView::initView($dir, $sess, $paths, $latest, $categories, $isAllowed);
        Footer::initFooterSKRN($dir); 
    }else{
        Nav::gotoHome($dir);
    }
