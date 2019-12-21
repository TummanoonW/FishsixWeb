<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_edit_categories.php');
    Includer::include_fun($dir, 'fun_category.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(FALSE, 'จัดการหมวดหมู่', $dir . App::$pageAdminManageCategories),
        new Path(TRUE, 'โปรแกรมแก้ไขหมวดหมู่', $dir . App::$pageAdminAddCategories)
    );

    if($sess->checkUserAdmin()){
        $id = $io->id;
        $isNew = ($id == NULL);
        if($isNew){
            $category = array(
                'title' => '',
                'parentID' => ''
            );
        }else{
            $result = FunCategory::getSingle($api, $id);
            $category = $result->response;
        }

        $result = FunCategory::get($api);
        $categories = $result->response;

        Header::initHeader($dir, "แอดมิน - โปรแกรมแก้ไขหมวดหมู่"); 
        AdminAddCategoriesView::initView($dir, $sess, $paths, $isNew, $category, $categories);
        Footer::initFooter($dir); 
    }else{
        Nav::gotoHome($dir);
    }