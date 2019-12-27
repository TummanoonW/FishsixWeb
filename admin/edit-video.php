<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_video.php');
    Includer::include_fun($dir, 'fun_video_lib.php');
    Includer::include_fun($dir, 'fun_category.php');

    $sess = new Sess();
    $auth = $sess->getAuth();
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    if($sess->checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);
        if($isNew) $label = 'เพิ่ม';
        else $label = 'แก้ไข';
    
        $paths = array(
            new Path(FALSE, 'หน้าหลัก', $dir),
            new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
            new Path(FALSE, 'จัดการคลังวิดีโอ', $dir . App::$pageAdminManageVideos),
            new Path(TRUE, "โปรแกรม" . $label . "วิดีโอ", $dir . App::$pageAdminEditVideo)
        );

        if($isNew){
            $video = new StdClass();
        }else{
            $result = FunVideoLib::getSingle($api, $id);
            $video = $result->response;
        }

        $result = FunCategory::get($api);
        $categories = $result->response;

        Header::initHeader($dir, "แอดมิน - โปรแกรม" . $label . "วิดีโอ"); 
        AdminVideoEditorView::initView($dir, $sess, $paths, $isNew, $label, $video, $categories);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }
?>
    