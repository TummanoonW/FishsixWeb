<?php
    class HomeView{
        public static function initView($dir, $pages
        //, $courses, $categories
        ){
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
                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">Courses</h1>
                                        </div>
                                        <div class="media-right">
                                            <div class="btn-group btn-group-sm">
                                                <a href="#" class="btn btn-white active"><i class="material-icons">list</i></a>
                                                <a href="#" class="btn btn-white"><i class="material-icons">dashboard</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>


                                    <div class="row">
                                        <!-- Course Card -->
                                        <?php 
                                            //foreach ($courses as $key => $value) {
                                            //    self::initCard($dir, $key, $value, $categories);
                                           // }
                                        ?>
                                        <div class="card-columns">
                                        <div class="card">
                                            <div class="card-header text-center">
                                                <h4 class="card-title mb-0"><a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>">Learn VueJs</a></h4>
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
                                                <h4 class="card-title mb-0"><a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>">Npm &amp; Gulp Advanced Workflow</a></h4>
                                                <div class="rating">
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star_half</i>
                                                    <i class="material-icons">star_border</i>
                                                </div>
                                            </div>
                                            <a href="<?php Nav::echoURL($dir,App::$pageCourseView) ?>">
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
                                                <h4 class="card-title mb-0"><a href="<?php Nav::echoURL($dir,App::$pageCourseView) ?>">Github Webhooks for Beginners</a></h4>
                                                <div class="rating">
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star_border</i>
                                                    <i class="material-icons">star_border</i>
                                                    <i class="material-icons">star_border</i>
                                                </div>
                                            </div>
                                            <a href="<?php Nav::echoURL($dir,App::$pageCourseView) ?>">
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
                                                <h4 class="card-title mb-0"><a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>">Gulp &amp; Slush Workflows</a></h4>
                                                <div class="rating">
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star</i>
                                                    <i class="material-icons">star_border</i>
                                                </div>
                                            </div>
                                            <a href="<?php Nav::echoURL($dir,App::$pageCourseView) ?>">
                                                <img src="assets/images/gulp.png" alt="Card image cap" style="width:100%;">
                                            </a>
                                            <div class="card-body">
                                                <small class="text-muted">ADVANCED</small><br>
                                                Let’s start with a quick tour of Vue’s data binding features. If you are more interested in ...<br>
                                                <span class="badge badge-primary ">GULP</span> <span class="badge badge-primary ">SLUSH</span>
                                            </div>
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
        
        public static function initCard($dir, $key, $course, $categories){
?>
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="card-title mb-0"><a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=" . $course->ID) ?>"><?php echo $course->title ?></a></h4>
                    <div class="rating">
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star_border</i>
                    </div>
                </div>
                <a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=" . $course->ID) ?>">
                    <img src="<?php Asset::echoThumb($dir, $course->thumbnail) ?>" alt="<?php echo $course->title ?>" style="width:100%">
                </a>
                <div class="card-body">
                    <small class="text-muted">ADVANCED</small><br>
                    <?php echo $course->description_short ?><br>
                    <span class="badge badge-primary "><?php echo self::printCategory($course->categoryID, $categories) ?></span>
                </div>
            </div>
        </div>
<?php
        }

        public static function printCategory($id, $cats){
            $title = "Uncategorized";
            foreach ($cats as $key => $value) {
                if($value->ID == $id){
                    $title = $value->title;
                }
            }
            return $title;
        }
    }