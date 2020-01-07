<?php
    class AdminManageOrdersView{
        public static function initView($dir, $sess, $paths, $pages, $orders, $status, $since, $desc){
            $search = array(
                'status' => $status,
                'since' => $since,
                'desc' => $desc
            );
            $urls = array(
                'pageAdminManageOrders' => Nav::getURL($dir, App::$pageAdminManageOrders)
            );
            ?>
                <body class=" layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">
                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '', $sess) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">จัดการคำสั่งซื้อ</h1>
                                        </div> 
                                        <!--<a href="<?php Nav::echoURL($dir, App::$pageAdminAddUser) ?>" class="btn btn-success">+ เพิ่มผู้ใช้</a>-->
                                    </div>

                                    <?php if(count($orders) > 0){ ?>
                                        <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                            <form action="#">
                                                <div class="form-inline pl-3 pb-3">
                                                    <div class="form-group mr-2">
                                                        <select id="published01" class="form-control custom-select" style="width: 180px" onchange="searchStatus(this)">
                                                            <option value="">ทุกสถานะ</option>
                                                            <option value="pending" <?php if($status == 'confirm') echo 'selected' ?>>ยืนยัน</option>
                                                            <option value="confirmed" <?php if($status == 'pending') echo 'selected' ?>>รอการตรวจสอบ</option>
                                                            <option value="rejected" <?php if($status == 'rejected') echo 'selected' ?>>ปฏิเสธ</option>
                                                        </select>
                                                    </div>

                                                    <div class="search-form search-form--light">
                                                        <input name="date" id="date" type="date" class="form-control" placeholder="YYYY-MM-DD" id="searchSample02" value="<?php echo $since ?>">
                                                        <button onclick="searchDate()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                    </div>

                                                    <div class="flex text-right">
                                                        <button onclick="exportExcel()" class="btn btn-secondary"><i class="fas fa-download mr-2"></i>ดาวน์โหลดเป็น Excel</button>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                    <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">แสดงผลลัพธ์ <?php echo count($orders) ?> จาก <?php echo count($orders) ?> รายการ</small>
                                                    <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                        <small class="text-muted text-uppercase mr-3 d-none d-sm-block">จัดเรียงโดย</small>
                                                        <?php 
                                                              if($desc){ 
                                                        ?>
                                                                <a href="#" onclick="searchDesc(false)" class="sort small text-uppercase ml-2">ล่าสุด - เก่าสุด</a>
                                                        <?php }else{ 
                                                        ?>
                                                                <a href="#" onclick="searchDesc(true)" class="sort small text-uppercase ml-2">เก่าสุด - ล่าสุด</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="card table-responsive" data-toggle="lists" data-lists-values='["ID", "owner", "amount", "status", "date"]'>
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <td>
                                                            ใบเสร็จ
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="ID">รหัสคำสั่งซื้อ</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="owner">ผู้สั่งซืื้อ</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="amount">ยอดชำระ</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="status">สถานะ</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="date">วันที่</a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <? self::initItems($dir, $orders) ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }else{ 
                                        Alert::initAlert($dir, "คุณไม่มีรายการคำสั่งซื้อให้แสดง");
                                    } ?>

                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div> 

                <script id="search"><?php echo json_encode($search) ?></script>
                <script id="urls"><?php echo json_encode($urls) ?></script>
                <script id="orders"><?php echo json_encode($orders) ?></script>

                <?php Script::customScript($dir, 'common.js') ?>  
                <?php Script::customScript($dir, 'admin-manage-orders.js') ?>
                <?php Script::initScript($dir) ?> 
                

<?php
        }

        private static function initItems($dir, $orders){
            foreach ($orders as $key => $item) {
                $id = $item->ID;
                $fname = $item->owner->user->fname;
                $lname = $item->owner->user->lname;
                ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a class="col-sm-6 col-md-4 col-lg-3 p-0" href="<? echo $item->slip_pic ?>" target="_blank">
                                    <img class="icon-block" style="object-fit: cover; background: black;" src="<? echo $item->slip_pic ?>" />
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminViewOrder . "?id=$id") ?>" class="text-body small">#<span class="ID"><? echo $id ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminViewOrder . "?id=$id") ?>" class="text-body small"><span class="owner"><? echo $fname . " " . $lname ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase">&#3647;<span class="amount"><?php echo $item->totalPrice ?></span> บาท</small>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <? switch($item->status){
                                    case 'pending':
                                ?>
                                        <i class="material-icons text-secondary md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">รอการตรวจสอบ</small>
                                <?
                                        break;
                                    case 'confirm':
                                ?>
                                        <i class="material-icons text-success md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">ยืนยันแล้ว</small>
                                <?
                                        break;
                                    case 'rejected':
                                ?>
                                        <i class="material-icons text-danger md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">ถูกปฏิเสธ</small>
                                <?
                                        break;
                                    default: 
                                ?>
                                        <i class="material-icons text-light md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">ไม่ทราบสถานะ</small>
                                <?      break;
                                    } 
                                ?>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase date"><? echo $item->date ?></small>
                            </div>
                        </td>
                        <td>
                            <div class="input-group-append">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">จัดการ</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=confirm&id=$id") ?>">ยืนยัน</a>
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=pending&id=$id") ?>">รอการตรวจสอบ</a>
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageAdminViewOrder . "?id=$id") ?>">ดูรายละเอียด</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=rejected&id=$id") ?>">ปฏิเสธ</a>
                              </div>
                            </div>
                        </td>
                    </tr>
                <?php
            }
        }
    }