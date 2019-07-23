<?php
    class HomeView{
        public static function initView($dir, $pages, $courses, $categories){
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
                                            foreach ($courses as $key => $value) {
                                                self::initCard($dir, $key, $value, $categories);
                                            }
                                        ?>
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
                    <h4 class="card-title mb-0"><a href="<?php Nav::printURL($dir, App::$pageCourseView . "?id=" . $course->ID) ?>"><?php echo $course->title ?></a></h4>
                    <div class="rating">
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star</i>
                        <i class="material-icons">star_border</i>
                    </div>
                </div>
                <a href="<?php Nav::printURL($dir, App::$pageCourseView . "?id=" . $course->ID) ?>">
                    <img src="<?php Asset::printThumb($dir, $course->thumbnail) ?>" alt="<?php echo $course->title ?>" style="width:100%">
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