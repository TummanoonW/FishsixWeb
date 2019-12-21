<?php
    class TeacherHomeView{
        public static function initView($dir, $sess, $paths, $items, $categories){
            $auth = $sess->getAuth();
?>
            <body class=" layout-fluid">
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

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">ระบบการสอน</h1>
                                        </div>
                                        <div class="media-right">
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php Nav::echoURL($dir, App::$pageTeacherManageStudent) ?>" class="btn btn-white active"><i class="material-icons">list</i></a>
                                                <a href="<?php Nav::echoURL($dir, App::$pageTeacherManageStudent) ?>" class="btn btn-white"><i class="material-icons">dashboard</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-columns">
                                        <?php self::initCards($dir, $items, $categories) ?>
                                    </div>
                                </div>

                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div> 
                <?php Script::initScript($dir) ?>
<?php
        }

        private static function initCards($dir, $items, $categories){
            foreach ($items as $key => $item) {
                $id = $item->ID;
                $course = $item->course;
                $courseID = $item->courseID;
                ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php Nav::echoURL($dir, App::$pageTeacherManageStudent . "?id=$id") ?>">
                                        <img src="<?php Asset::echoThumb($dir, $course->thumbnail) ?>" alt="<? echo $course->title ?>" width="100" class="rounded">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="card-title m-0"><a href="<?php Nav::echoURL($dir, App::$pageTeacherManageStudent . "?id=$id"); ?>" ><?php echo $course->title ?></a></h4>
                                    <small class="text-muted">หมวดหมู่: <?php self::echoCategory($course->categoryID, $categories) ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <div class="media">
                                <div class="media-left">
                                    <a href="<?php Nav::echoURL($dir, App::$pageTeacherManageStudent . "?id=$id"); ?>" class="btn btn-success btn-sm">ประเมินนักเรียน<i class="material-icons btn__icon--right">grade</i></a>
                                </div>
                                <div class="media-body">
                                </div>
                                <div class="media-right">
                                    <!--<button type="button" class="btn btn-light btn-sm">ชม.ที่เหลือ </span></button>-->
                                </div>    
                            </div>
                        </div>
                    </div>
                <?
            }
        }

        private static function echoCategory($categoryID, $categories){
            foreach ($categories as $key => $cat) {
                if($categoryID == $cat->ID) echo $cat->title;
            }
        }
    }