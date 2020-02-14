<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_videos.php');
    Includer::include_fun($dir, 'fun_video_lib.php');
    Includer::include_fun($dir, 'fun_category.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API('any');
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการคลังวิดีโอ', $dir . App::$pageAdminManageVideos)
    );

    if($sess->checkUserAdmin()){

        if(!isset($io->get->category)) $search = (object)array(
            'category' => '',
            'query' => '',
            'desc' => TRUE,
            'limit' => 24,
            'offset' => 0,
            'page' => 0
        );
        else $search = $io->get;
        
        $limit = $search->limit;

        $result = FunVideoLib::countFiltered($api, $search);
        $count = $result->response;

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }

        $params = "&";
        foreach ($search as $key => $value) {
            if($key != 'page') $params = $params . $key . '=' . $value . "&";
        }

        $pages = Path::genPages($dir, App::$pageAdminManageVideos, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;
        foreach ($pages as $key => $value) {
            $value->url = $value->url . $params;
        }

        $offset = ($c_page * $limit);        
        $search->offset = $offset;

        $result = FunVideoLib::getFiltered($api, $search);
        $videos = $result->response;

        $result = FunCategory::get($api);
        $categories = $result->response;

        Console::log('videos', $videos);
        Console::log('categories', $categories);

        Header::initHeader($dir, "แอดมิน - จัดการคลังวิดีโอ"); 
        AdminManageVideosView::initView($dir, $sess, $paths, $pages, $videos, $categories, $count, $search);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

?>
    