<?php
    class TeacherManageStudentView{
        public static function initView($dir, $paths, $courseTeacher, $course){
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
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">ประเมินนักเรียน - <?php $course->title ?></h1>
                                        </div>
                                        <div class="media-right">
                                            
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