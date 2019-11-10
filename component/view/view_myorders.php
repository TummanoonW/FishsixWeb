<?php
    class MyOrdersView{
        public static function initView($dir, $paths, $orders){
            ?>
                <body class=" layout-fluid">
                    <!-- Pre Loader -->
                    <?php Preloader::initPreloader($dir) ?>

                    <!-- Header Layout -->
                    <div class="mdk-header-layout js-mdk-header-layout">

                        <!-- Header -->
                        <?php Toolbar::initToolbar($dir, '') ?>
                        <!-- // END Header -->

                        <!-- Header Layout Content -->
                        <div class="mdk-header-layout__content">

                            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                                <div class="mdk-drawer-layout__content page ">

                                    <div class="container-fluid page__container p-0">
                                        <div class="row m-0">
                                            <div class="col-lg container-fluid page__container">
                                                <!-- Navigation Paths -->
                                                <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                                <h1 class="h2">คำสั่งซื้อของฉัน</h1>

                                                <!--<div class="card border-left-3 border-left-danger card-2by1">
                                                    <div class="card-body">
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                Please pay your amount due
                                                                <strong class="text-danger">$25.00</strong> with invoice <a href="#">#8331</a>
                                                            </div>
                                                            <div class="media-right">
                                                                <a href="student-pay.html" class="btn btn-success float-right">Pay Now</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->

                                                <?php if(count($orders) > 0){ ?>
                                                <div class="card table-responsive" data-toggle="lists" data-lists-values='[
                                                    "js-lists-values-document", 
                                                    "js-lists-values-amount",
                                                    "js-lists-values-status",
                                                    "js-lists-values-date"
                                                    ]' data-lists-sort-by="js-lists-values-document" data-lists-sort-desc="true">
                                                    <table class="table mb-0">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th colspan="4">
                                                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-document">รหัสคำสั่งซื้อ</a>
                                                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-amount">ยอดชำระ</a>
                                                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-status">สถานะ</a>
                                                                    <a href="javascript:void(0)" class="sort" data-sort="js-lists-values-date">วันที่</a>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="list">
                                                            <?php self::initItems($dir, $orders) ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php } else {
                                                    Alert::initAlert($dir, "ไม่มีรายการคำสั่งซื้อ ที่ต้องแสดง");
                                                   } ?>
                                                
                                                <!-- Pagination -->
                                                <!--<ul class="pagination justify-content-center pagination-sm">
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                                                            <span>Prev</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#" aria-label="1">
                                                            <span>1</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="1">
                                                            <span>2</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span>Next</span>
                                                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                                                        </a>
                                                    </li>
                                                </ul>-->
                                                
                                            </div>
                                        </div>
                                    </div>     
                                </div>
                                <?php Sidemenu::initSideMenu($dir) ?>
                            </div>
                        </div>
                    </div>
                    <?php Script::initScript($dir) ?>
            <?php
        }

        private static function initItems($dir, $orders){
            foreach ($orders as $key => $item) {
                ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase text-muted mr-2">รหัสคำสั่งซื้อ</small>
                                <a href="<?php Nav::echoURL($dir, App::$pageViewOrder . "?id=$item->ID") ?>" class="text-body small">#<span class="js-lists-values-document"><?php echo $item->ID ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase text-muted mr-2">ยอดชำระ</small>
                                <small class="text-uppercase">&#3647;<span class="js-lists-values-amount"><?php echo $item->totalPrice ?></span> บาท</small>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase text-muted mr-2">สถานะ</small>
                                <?php switch($item->status){
                                    case 'pending':
                                ?>
                                        <i class="material-icons text-secondary md-18 mr-2">lens</i>
                                        <small class="text-uppercase js-lists-values-status">รอการตรวจสอบ</small>
                                <?php
                                        break;
                                    case 'confirm':
                                ?>
                                        <i class="material-icons text-success md-18 mr-2">lens</i>
                                        <small class="text-uppercase js-lists-values-status">ยืนยันแล้ว</small>
                                <?php
                                        break;
                                    case 'rejected':
                                ?>
                                        <i class="material-icons text-danger md-18 mr-2">lens</i>
                                        <small class="text-uppercase js-lists-values-status">ถูกปฏิเสธ</small>
                                <?php
                                        break;
                                    default: 
                                ?>
                                        <i class="material-icons text-light md-18 mr-2">lens</i>
                                        <small class="text-uppercase js-lists-values-status">ไม่ทราบสถานะ</small>
                                <?php   break;
                                    } 
                                ?>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase text-muted mr-2">วันที่</small>
                                <small class="text-uppercase js-lists-values-date"><?php echo $item->date ?></small>
                            </div>
                        </td>
                    </tr>
                <?php
            }
        }
    }
?>