<?php
    $dir = '../';

    include_once $dir . 'includer/includer.php'; 
    Includer::include_proto($dir); 
    Includer::include_admin($dir, 'admin_manage_orders.php');
    Includer::include_fun($dir, 'fun_order.php');
    Includer::include_fun($dir, 'fun_admin_order.php');

    $sess = new Sess(); $auth = $sess->getAuth(); 
    $apiKey = $sess->getAPIKey(); 

    $api = new API($apiKey);
    $io = new IO(); 

    $paths = array(
        new Path(FALSE, 'หน้าหลัก', $dir),
        new Path(FALSE, 'ระบบจัดการ', $dir . App::$pageAdminPanel),
        new Path(TRUE, 'จัดการคำสั่งซื้อ', '')
    );

    if($sess->checkUserAdmin()){
        $limit = 50;

        if(isset($io->get->status)) $status = $io->get->status;
        else $status = "";
        if(isset($io->get->since)) $since = $io->get->since;
        else $since = "";
        if(isset($io->get->desc)) $desc = $io->get->desc;
        else $desc = TRUE;
        if(isset($io->get->query)) $query = $io->get->query;
        else $query = "";

        if($io->page == NULL){
            $c_page = 0;
        }else{
            $c_page = $io->page;
        }


        $offset = ($c_page * $limit);        

        $filter = (object)array(
            'limit' => $limit,
            'offset' => $offset,
            'status' => $status,
            'since' => $since,
            'desc' => $desc,
            'query' => $query
        );

        $result = FunAdminOrder::countFiltered2($api, $filter);
        $count = $result->response;

        $pages = Path::genPages($dir, App::$pageAdminManageOrders, $limit, $c_page, $count);
        $pages[$c_page]->active = TRUE;
        foreach ($pages as $key => $value) {
            $value->url = $value->url . "&status=$status&since=$since&desc=$desc&query=$query"; 
        }

        $result = FunAdminOrder::getFiltered2($api, $filter);
        $orders = $result->response;

        Console::log('orders', $orders);

        Header::initHeader($dir, "แอดมิน - จัดการคำสั่งซื้อ"); 
        AdminManageOrdersView::initView($dir, $sess, $paths, $pages, $orders, $status, $since, $desc, $query);
        Footer::initFooter($dir); 

    }else{
        Nav::gotoHome($dir);
    }

    