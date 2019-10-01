<?php
    class AdminHomeView{
        public static function initView($dir, $paths){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <style>
                    a > div > i{
                        font-size: 26px;
                    }
                </style>
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
                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">ระบบจัดการ</h1>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <h3>Fishsix</h3>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4 pb-3">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminManageCourses) ?>" class="btn btn-primary w-100 h-100">
                                                <div class="pb-2 pt-2">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    <div class="mt-1">จัดการคอร์สเรียน</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-4 pb-3">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminManageCategories) ?>" class="btn btn-primary w-100 h-100">
                                                <div class="pb-2 pt-2">
                                                    <i class="fas fa-stream"></i>
                                                    <div class="mt-1">จัดการหมวดหมู่</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-4 pb-3">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminManageBranch) ?>" class="btn btn-primary w-100 h-100">
                                                <div class="pb-2 pt-2">
                                                    <i class="far fa-building"></i>
                                                    <div class="mt-1">จัดการสาขา</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>การค้าขาย</h3>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4 pb-3">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminManageOrders) ?>" class="btn btn-success w-100 h-100">
                                                <div class="pb-2 pt-2">
                                                    <i class="fas fa-boxes"></i>
                                                    <div class="mt-1">จัดการคำสั่งซื้อ</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-4 pb-3">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminManageBookings) ?>" class="btn btn-success w-100 h-100">
                                                <div class="pb-2 pt-2">
                                                    <i class="fas fa-book-open"></i>
                                                    <div class="mt-1">จัดการการจอง</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3>ทั่วไป</h3>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-4 pb-3">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminManageUser) ?>" class="btn btn-secondary w-100 h-100">
                                                <div class="pb-2 pt-2">
                                                    <i class="fas fa-users"></i>
                                                    <div class="mt-1">จัดการผู้ใช้</div>
                                                </div>
                                            </a>
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