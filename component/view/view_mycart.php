<?php
    class MyCartView{
        public static function initView($dir, $paths, $carts, $cartsS, $isLoggedIn){
            $data = array(
                'isLoggedIn' => $isLoggedIn,
                'carts' => $carts,
                'cartsS' => $cartsS
            );
            $urls = array(
                'routeMyCart' => $dir . App::$routeMyCart,
                'pageCheckOut' => $dir . App::$pageCheckOut,
                'pageCourseView' => $dir . App::$pageCourseView,
                'pageHome' => Nav::getHome($dir),
                'thumb_def' => $dir . Asset::$thumb_def
            );
?>
            <body class=" layout-fluid">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir); ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, ''); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->    
                    <div class="mdk-header-layout__content" style="padding-top: 64px;">

                        <div data-push="" data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout" data-domfactory-upgraded="mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page " style="transform: translate3d(0px, 0px, 0px);">

                                <div class="container-fluid page__container">
                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>
                                    <h1 class="h2">ตะกร้าสินค้า ของฉัน</h1>
                                    <div class="card table-responsive">
                                        <table class="table table-nowrap mb-0 table--elevated">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>รายระเอียด</th>
                                                    <th style="width: 100px" class="text-center">ชั่วโมง</th>
                                                    <th style="width: 100px" class="text-right">ราคารวม</th>
                                                    <th style="width: 10px"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="cart-list">
                                                
                                            </tbody>
                                        </table>

                                        <table class="table mb-0">
                                            <tfoot>
                                                <tr>
                                                    <td class="text-right text-black-70"><strong>รวมชำระเงิน</strong></td>
                                                    <td style="width: 100px;" class="text-right"><strong id="total"></strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="card-footer d-flex align-items-center">
                                            <a href="<?php Nav::echoHome($dir) ?> " class="btn btn-white">กลับไปหน้าร้าน</a>
                                            <button onclick="checkOut()" class="btn btn-success ml-auto">
                                                ชำระเงิน <i class="material-icons btn__icon--right">credit_card</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php Sidemenu::initSideMenu($dir) ?>
                    </div>
                </div>

            </div>  

            <?php Modal::initRegisterModal($dir, Nav::getURL($dir, App::$pageMyCart)) ?>

            <?php Script::initScript($dir) ?>   
            
            
            <?php Script::customScript($dir, 'connect.js') ?>

            <script id="obj-data"><?php echo json_encode($data) ?></script>
            <script id="obj-urls"><?php echo json_encode($urls) ?></script>
            <?php Script::customScript($dir, 'mycart.js') ?>
<?php
        }

        public static function initRow($dir, $item){
?>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=" . $item->courseID) ?> " class="avatar avatar-4by3 avatar-sm mr-3">
                            <img src="<?php Asset::echoThumb($dir, $item->course->thumbnail) ?> " alt="<?php echo $item->course->title ?>" class="avatar-img rounded">
                        </a>
                        <div class="media-body">
                            <a href="#" class="text-body"><strong><?php echo $item->course->title ?></strong></a>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <div class="d-flex align-items-center">
                        <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">remove</i></a>
                        <input type="number" class="form-control" style="width: 64px" value="<?php echo $item->credit ?>">
                        <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">add</i></a>
                    </div>
                </td>
                <td class="text-right">
                    <p class="mb-0">&#3647;<?php echo self::calPrice($item->credit, $item->course->minPrice) ?> THB</p>
                </td>
                <td class="text-center">
                    <a href="#" class="text-muted"><i class="material-icons font-size-24pt">close</i></a>
                </td>
            </tr>
<?php
        }

        public static function calPrice($credit, $rate){
            return $credit * $rate;
        }
    }
?>