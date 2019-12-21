<?php
    class CheckOutView{
        public static function initView($dir, $sess, $paths){
            $auth = $sess->getAuth();
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
                                                        <p class="card-text">
                                                            <h4 class="card-title">วิธีการชำระเงิน</h4>
                                                            <ol>
                                                                <li>โอนเงินผ่านช่องทางที่กำหนด</li>
                                                                <li>หลังจากโอนเงินเสร็จ ให้ถ่ายรูปสลิปการโอนเงิน</li>
                                                                <li>อัพไฟล์รูปสลิปขึ้นเว็บไซต์</li>
                                                            </ol>
                                                        </p>

                                                        <div class="form-group row">
                                                            <label for="slip" class="col-sm-3 col-form-label form-label">ใบเสร็จของคุณ</label>
                                                            <div class="col-sm-9">
                                                                <div class="media align-items-center">
                                                                    <div class="media-left">
                                                                        <div class="icon-block rounded bg-transparent">
                                                                            <img id="slip" class="w-100 h-100" src="<?php Asset::echothumb($dir, '') ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="custom-file" style="width: auto;">
                                                                            <input name="slip_pic" type="file" class="custom-file-input" accept="image/*" onchange="uploadToPictureRaw(this, '#slip')">
                                                                            <label for="slip" class="custom-file-label">อัพโหลดไฟล์</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
<?php
        }
    }
?>