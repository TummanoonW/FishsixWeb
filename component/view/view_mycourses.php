<?php
    class MyCoursesView{
        public static function initView($dir, $paths, $pages){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir); ?>

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

                                    <!-- Navigation Paths -->
                                    <?php NavPath::initNavPath($dir, $paths); ?>

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">My Courses</h1>
                                        </div>
                                        <div class="media-right">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
                                                <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-columns">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="<?php Nav::printURL($dir,'student-student-take-course.html'); ?>">
                                                            <img src="<?php Nav::printURL($dir, 'assets/images/vuejs.png'); ?>" alt="Card image cap" width="100" class="rounded">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="card-title m-0"><a href="<?php Nav::printURL($dir,'student-take-course.html');?>">Learn VueJs the easy way!</a></h4>
                                                        <small class="text-muted">Lessons: 3 of 7</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress rounded-0">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <a href="<?php Nav::printURL($dir,'student-take-course.html'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="<?php Nav::printURL($dir, 'student-student-take-course.html'); ?>">
                                                            <img src="<?php Nav::printURL($dir, 'assets/images/gulp.png"'); ?> alt="Card image cap" width="100" class="rounded">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="card-title m-0"><a href="#">Npm &amp; Gulp Advanced Workflow</a></h4>
                                                        <small class="text-muted">Lessons: 7 of 7</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress rounded-0">
                                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="card-footer bg-white ">
                                                <a href="<?php Nav::printURL($dir,'student-take-course.html'); ?>"  class="btn btn-success btn-sm">Completed <i class="material-icons btn__icon--right">check</i></a>
                                                <a href="<?php Nav::printURL($dir,'student-take-course.html'); ?>"  class="btn btn-white btn-sm">Restart <i class="material-icons btn__icon--right">replay</i> </a>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="<?php Nav::printURL($dir,'student-student-take-course.html');?>">
                                                            <img src="<?php Nav::printURL($dir, 'assets/images/github.png'); ?>" alt="Card image cap" width="100" class="rounded">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="card-title m-0"><a href="#">Github Webhooks for Beginners</a></h4>
                                                        <small class="text-muted">Lessons: 8 of 10</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress rounded-0">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <a href="<?php Nav::printURL($dir,'student-take-course.html'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="<?php Nav::printURL($dir,'student-student-take-course.html'); ?>">
                                                            <img src="<?php Nav::printURL($dir, 'assets/images/gulp.png"'); ?>" alt="Card image cap" width="100" class="rounded">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="card-title m-0"><a href="#">Gulp and Slush</a></h4>
                                                        <small class="text-muted">Lessons: 5 of 7</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress rounded-0">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <a href="<?php Nav::printURL($dir,'student-take-course.html'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header ">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <a href="<?php Nav::printURL($dir,'student-student-take-course.html'); ?>">
                                                            <img src="<?php Nav::printURL($dir, 'assets/images/vuejs.png'); ?>" alt="Card image cap" width="100" class="rounded">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="card-title m-0"><a href="#">VueJs</a></h4>
                                                        <small class="text-muted">Lessons: 3 of 7</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress rounded-0">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="card-footer bg-white">
                                                <a href="<?php Nav::printURL($dir,'student-take-course.html'); ?>" class="btn btn-primary btn-sm">Continue <i class="material-icons btn__icon--right">play_circle_outline</i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages); ?>

                                </div>

                            </div>
                            <?php Sidemenu::initSideMenu($dir); ?>
                        </div>
                    </div>
                </div> 
                <?php Script::initScript($dir); ?>
<?php
        }
    }
?>