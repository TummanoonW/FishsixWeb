<?php
    class BrowseCoursesView{
        public static function initView($dir, $paths, $pages){
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

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">All Courses</h1>
                                        </div>
                                        <div class="media-right">
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>" class="btn btn-white active"><i class="material-icons">list</i></a>
                                                <a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>" class="btn btn-white"><i class="material-icons">dashboard</i></a>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="card-columns">
                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h4 class="card-title mb-0"><a href="student-take-course.html">Learn VueJs</a></h4>
                                                <div class="rating">
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star_border</i>
                                                </div>
                                            </div>
                                            <a href="<?php Nav::echoURL($dir,App::$pageCourseView) ?>">
                                                <img src="assets/images/vuejs.png" alt="Card image cap" style="width:100%;">
                                            </a>
                                            <div class="card-body">
                                                <small class="text-muted">ADVANCED</small><br>
                                                Let’s start with a quick tour of Vue’s data binding features. If you are more interested in ...<br>
                                                <span class="badge badge-primary ">VUEJS</span>
                                                
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h4 class="card-title mb-0"><a href="student-take-course.html">Npm &amp; Gulp Advanced Workflow</a></h4>
                                                <div class="rating">
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star_half</i>
                                                    <i class="material-icons">star_border</i>
                                                </div>
                                            </div>
                                            <a href="student-take-course.html">
                                                <img src="assets/images/nodejs.png" alt="Card image cap" style="width:100%;">
                                            </a>
                                            <div class="card-body">
                                                <small class="text-muted">BEGINNER</small><br>
                                                Developing static website with fast and advanced gulp setup by managing all parts...<br>
                                                <small class="badge badge-primary ">GULP</small>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h4 class="card-title mb-0"><a href="student-take-course.html">Github Webhooks for Beginners</a></h4>
                                                <div class="rating">
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star_border</i>
                                                    <i class="material-icons">star_border</i>
                                                    <i class="material-icons">star_border</i>
                                                </div>
                                            </div>
                                            <a href="student-take-course.html">
                                                <img src="assets/images/github.png" alt="" style="width:100%;">
                                            </a>
                                            <div class="card-body">
                                                <small class="text-muted">INTERMEDIATE</small><br>
                                                Learn the basics of Github and become a power Github developer.<br>
                                                <small class="badge badge-primary ">GULP</small>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h4 class="card-title mb-0"><a href="student-take-course.html">Gulp &amp; Slush Workflows</a></h4>
                                                <div class="rating">
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star_border</i>
                                                </div>
                                            </div>
                                            <a href="student-take-course.html">
                                                <img src="assets/images/gulp.png" alt="Card image cap" style="width:100%;">
                                            </a>
                                            <div class="card-body">
                                                <small class="text-muted">ADVANCED</small><br>
                                                Let’s start with a quick tour of Vue’s data binding features. If you are more interested in ...<br>
                                                <span class="badge badge-primary ">GULP</span> <span class="badge badge-primary ">SLUSH</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
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