<?php
    class AdminHomeView{
        public static function initView($dir){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <div class="preloader">
                    <div class="sk-double-bounce">
                        <div class="sk-child sk-double-bounce1"></div>
                        <div class="sk-child sk-double-bounce2"></div>
                    </div>
                </div>
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">
                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir); ?>
                    <!-- // END Header -->
                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">
                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">
                                <div class="container-fluid page__container">
                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">Admin Panel</h1>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="<?php Nav::printURL($dir, Nav::$pageAdminManageCourses); ?>" class="btn btn-success">Manage Courses</a>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir); ?>
                        </div>
                    </div>
                </div>
<?php
        }
    }