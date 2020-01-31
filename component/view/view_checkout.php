<?php
    class CheckOutView{
        public static function initView($dir, $sess, $paths){
            $auth = $sess->getAuth();
            $carts = $sess->get('mycart');
            if($carts == NULL) $carts = [];
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
                        <div class="mdk-header-layout__content" style="padding-top: 64px">
                            <div data-push="" data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout" data-domfactory-upgraded="mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page " style="transform: translate3d(0px, 0px, 0px)">
                                <div class="container-fluid page__container">
                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>
                                    <h1 class="h2">ชำระสินค้า</h1>
                                        <div class="col-lg">
                                            <div class="card">
                                                <form action="<?php Nav::echoURL($dir, App::$routeCheckOut . '?m=checkout') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img class="w-100 h-auto" src="<?php Asset::embedImage($dir, 'account_1.jpg') ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img class="w-100 h-auto" src="<?php Asset::embedImage($dir, 'account_2.jpg') ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-12 mt-2">
                                                                <div class="card table-responsive">
                                                                    <table class="table table-nowrap mb-0 table--elevated">
                                                                        <thead class="thead-light">
                                                                            <tr>
                                                                                <th>รายระเอียด</th>
                                                                                <th style="width: 100px" class="text-center">ชั่วโมง</th>
                                                                                <th style="width: 100px" class="text-right">ราคารวม</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="cart-list">
                                                                            <?php self::initItems($dir, $carts) ?>
                                                                        </tbody>
                                                                    </table>

                                                                    <table class="table mb-0">
                                                                        <tfoot>
                                                                            <tr>
                                                                                <td class="text-right text-black-70"><strong>รวมชำระเงิน</strong></td>
                                                                                <td style="width: 100px;" class="text-right"><strong id="total">&#3647;<?php self::calPrice($carts) ?></strong></td>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12 mt-2">
                                                                <p>
                                                                    <h4>วิธีการชำระเงิน</h4>
                                                                    <ol>
                                                                        <li>โอนเงินผ่านช่องทางที่กำหนด</li>
                                                                        <li>หลังจากโอนเงินเสร็จ ให้ถ่ายรูปสลิปการโอนเงิน</li>
                                                                        <li>อัพไฟล์รูปสลิปขึ้นเว็บไซต์</li>
                                                                    </ol>
                                                                    <div class="form-group">
                                                                        <h4>ใบเสร็จของคุณ</h4>
                                                                        <div class="rounded bg-transparent flex">
                                                                            <img id="slip" class="" src="<?php Asset::echoThumb($dir, '') ?>" style="max-width: 256px; max-height: 512px;">
                                                                            <div class="custom-file mt-3" style="width: auto;">
                                                                                <input name="slip_pic" type="file" class="custom-file-input" accept="image/*" onchange="uploadToPictureRaw(this, '#slip')">
                                                                                <label for="slip" class="custom-file-label">อัพโหลดไฟล์ภาพ</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer text-center">
                                                            <button type="submit" class="btn btn-success">ยืนยันการชำระเงิน</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>                                 
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                <?php Script::customScript($dir, 'common.js') ?>
<?php
        }

        private static function initItems($dir, $carts){
            foreach ($carts as $key => $value) {
            ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <a href="<?php Nav::echoURL($dir, App::$pageCourseView . '?q={"id":'.$value->course->ID.'}') ?>" target="_blank" class="avatar avatar-4by3 avatar-sm mr-3">
                                <img src="<?php Asset::echoThumb($dir, $value->course->thumbnail) ?>'" alt="<?php echo $value->course->title ?>" class="avatar-img rounded">
                            </a>
                            <div class="media-body">
                                <a href="<?php Nav::echoURL($dir, App::$pageCourseView . '?q={"id":'.$value->course->ID.'}') ?>" target="_blank" class="text-body"><strong><?php echo $value->course->title ?></strong></a>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex align-items-center">
                            <label><?php echo $value->package->credit ?></label>
                        </div>
                    </td>
                    <td class="text-right">
                        <p class="mb-0">&#3647;<?php echo $value->package->price ?> บาท</p>
                    </td>
                </tr>
            <?php
            }
        }

        private static function calPrice($carts){
            $total = 0;
            foreach ($carts as $key => $value) {
                $price = (float)$value->package->price;
                $total = $total + $price;
            }
            echo number_format($total);
        }
    }
?>