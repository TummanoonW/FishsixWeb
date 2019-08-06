<?php
    class AdminHomeView{
        public static function initView($dir, $paths){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">
                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir) ?>
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
                                            <h1 class="h2">Admin Panel</h1>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminManageCourses) ?>" class="btn btn-success">Manage Courses</a>
                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminManageCategories) ?>" class="btn btn-success">Manage Categories</a>
                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminManageUser) ?>" class="btn btn-success">Manage User</a>
                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminManageBranch) ?>" class="btn btn-success">Manage Branch</a>
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