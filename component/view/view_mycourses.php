<?php
    class MyCoursesView{
        public static function initView($dir, $paths, $pages, $ownerships){
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
                                            <h1 class="h2">คอร์สของฉัน</h1>
                                        </div>
                                        <div class="media-right">
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>" class="btn btn-white active"><i class="material-icons">list</i></a>
                                                <a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>" class="btn btn-white"><i class="material-icons">dashboard</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-columns">
                                        <?php self::initCards($dir, $ownerships) ?>
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

        private static function initCards($dir, $ownerships){
            foreach ($ownerships as $key => $item) {
                $id = $item->ID;
                $course = $item->course;
                $courseID = $item->courseID;
                $credit = (int)$item->credit;

                $duration = (int)$course->duration;
                if($duration < 1)$duration = 1;

                $x = $credit % $duration;
                $progress = (int)((1 - ($x / $duration)) * 100);
                ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=$courseID") ?>">
                                        <img src="<?php Asset::echoThumb($dir, $course->thumbnail) ?>" alt="<? echo $course->title ?>" width="100" class="rounded">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title m-0"><a href="<?php Nav::echoURL($dir, App::$pageCourseView . "?id=$courseID") ?>"><? echo $course->title ?></a></h4>
                                    <small class="text-muted">จำนวนชั่วโมงที่เหลือ: <? echo $item->credit ?> ชม.</small>
                                </div>
                            </div>
                        </div>
                        <div class="progress rounded-0">
                            <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: <?echo $progress ?>%" aria-valuenow="<?echo $progress?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="media">
                                <div class="media-left">
                                <a href="<?php Nav::echoURL($dir, App::$pageBookClass . "?id=$id") ?>" class="btn btn-primary btn-sm">จองรอบเรียน<i class="material-icons btn__icon--right">play_circle_outline</i></a>
                            </div>
                            <div class="media-body">
                            </div>
                            <div class="media-right">
                                <button type="button" class="btn btn-light btn-sm">ชม.ที่เหลือ <span class="badge badge-success ml-2">27</span></button>
                            </div>    
                        </div>
                        </div>
                    </div>
                    
                    <!-- COURSE COMPLETE (NOT USE YET)
                    <div class="card">
                        <div class="card-header">
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>">
                                        <img src="<?php Asset::echoThumb($dir, 'assets/images/thumbs/gulp.png"') ?>" alt="Card image cap" width="100" class="rounded">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title m-0"><a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>">Npm &amp; Gulp Advanced Workflow</a></h4>
                                    <small class="text-muted">Lessons: 7 of 7</small>
                                </div>
                            </div>
                        </div>
                        <div class="progress rounded-0">
                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="card-footer bg-white ">
                            <a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>"  class="btn btn-success btn-sm">Completed <i class="material-icons btn__icon--right">check</i></a>
                            <a href="<?php Nav::echoURL($dir, App::$pageCourseView) ?>"  class="btn btn-white btn-sm">Restart <i class="material-icons btn__icon--right">replay</i> </a>
                        </div>
                    </div>
                    -->
                <?
            }
        }
    }
?>