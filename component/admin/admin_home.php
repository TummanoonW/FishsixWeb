<?php
    class AdminHomeView{
        public static function initView($dir, $sess, $paths){
            $auth = $sess->getAuth();
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
                    <?php Toolbar::initToolbar($dir, '', $sess) ?>
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
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminManageClassrooms) ?>" class="btn btn-primary w-100 h-100">
                                                <div class="pb-2 pt-2">
                                                    <i class="fas fa-tasks"></i>
                                                    <div class="mt-1">จัดการรายชื่อผู้ลงเรียน</div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php if($auth->type == 'admin'){ ?>
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
                                            <div class="col-md-3 col-sm-4 pb-3">
                                                <a href="<?php Nav::echoURL($dir, App::$pageAdminManageVideos) ?>" class="btn btn-primary w-100 h-100">
                                                    <div class="pb-2 pt-2">
                                                        <i class="fab fa-youtube"></i>
                                                        <div class="mt-1">จัดการคลังวิดีโอ</div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <h3>การค้าขาย</h3>
                                    <div class="row">
                                        <?php if($auth->type == 'admin'){ ?>
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
                                            <div class="col-md-3 col-sm-4 pb-3">
                                                <a href="<?php Nav::echoURL($dir, App::$pageAdminManageOwnerships) ?>" class="btn btn-success w-100 h-100">
                                                    <div class="pb-2 pt-2">
                                                        <i class="fas fa-user-graduate"></i>
                                                        <div class="mt-1">จัดการความเป็นเจ้าของ</div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <h3>ทั่วไป</h3>
                                    <div class="row">
                                        <?php if($auth->type == 'admin'){ ?>
                                            <!--<div class="col-md-3 col-sm-4 pb-3">
                                                <a href="<?php Nav::echoURL($dir, App::$pageAdminManageInfo) ?>" class="btn btn-secondary w-100 h-100">
                                                    <div class="pb-2 pt-2">
                                                        <i class="fas fa-info"></i>
                                                        <div class="mt-1">จัดการข้อมูลบริษัท</div>
                                                    </div>
                                                </a>
                                            </div>-->
                                            <div class="col-md-3 col-sm-4 pb-3">
                                                <a href="<?php Nav::echoURL($dir, App::$pageAdminManageUser) ?>" class="btn btn-secondary w-100 h-100">
                                                    <div class="pb-2 pt-2">
                                                        <i class="fas fa-users"></i>
                                                        <div class="mt-1">จัดการผู้ใช้</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-sm-4 pb-3">
                                                <a href="<?php Nav::echoURL($dir, App::$pageAdminManageFeedbacks) ?>" class="btn btn-secondary w-100 h-100">
                                                    <div class="pb-2 pt-2">
                                                        <i class="fas fa-bug"></i>
                                                        <div class="mt-1">จัดการรายงานข้อผิดพลาด</div>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
<?php
        }
    }