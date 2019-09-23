<?php
    class CheckOutView{
        public static function initView($dir, $paths){
            $auth = Session::getAuth();
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
                        <div class="mdk-header-layout__content" style="padding-top: 64px">
                            <div data-push="" data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout" data-domfactory-upgraded="mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page " style="transform: translate3d(0px, 0px, 0px)">
                                <div class="container-fluid page__container">
                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>
                                    <h1 class="h2">Payment method</h1>
                                        <div class="col-lg">
                                            <div class="card">
                                                <form action="<?php Nav::echoURL($dir, App::$pageOrderCourses) ?>" class="form-horizontal">
                                                    <div class="card-body">

                                                        <div class="form-group row">
                                                            <img src="https://cu.lnwfile.com/_/cu/_raw/bc/19/ql.jpg" style="margin-left:auto;margin-right:auto;" alt="">
                                                        </div>

                                                        <div class="card">
                                                          <div class="card-body">
                                                            <p class="card-text">
                                                            <h4 class="card-title">วิธีการชำระเงิน</h4>
                                                                <ol>
                                                                    <li>โอนเงินผ่านช่องทางที่กำหนด</li>
                                                                    <li>หลังจากโอนเงินเสร็จ ให้ถ่ายรูปสลิปการโอนเงิน</li>
                                                                    <li>อัพไฟล์รูปสลิปขึ้นเว็บไซต์</li>
                                                                </ol>
                                                            </p>
                                                          </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="slip" class="col-sm-3 col-form-label form-label">Your slip</label>
                                                            <div class="col-sm-9">
                                                                <div class="media align-items-center">
                                                                    <div class="media-left">
                                                                        <div class="icon-block rounded">
                                                                            <i class="material-icons text-muted-light md-36">photo</i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="custom-file" style="width: auto;">
                                                                            <input type="file" id="slip" class="custom-file-input">
                                                                            <label for="slip" class="custom-file-label">Choose file</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <button type="submit" class="btn btn-success">Make Payment</button>
                                                        </div>
                                                </form>
                                            </div>
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
    }
?>