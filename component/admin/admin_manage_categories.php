<?php
    class AdminManageCategoriesView{
        public static function initView($dir, $sess, $paths, $pages, $categories, $count, $api){
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

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">จัดการหมวดหมู่</h1>
                                        </div>
                                        <div class="media-right">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminAddCategories) ?>" class="btn btn-success" style="margin-right: 4px">+ เพิ่มหมวดหมู่</a>
                                        </div>
                                    </div>

                                    <div class="card-columns">
                                        <!-- Category Card -->
                                        <?php foreach ($categories as $key => $value) {
                                            self::initCard($dir, $key, $value, $categories, $api);
                                        } ?>
                                    </div>
                                </div>
                                <?php Pagination::initPagination($dir, $pages) ?>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?> 
                
                
<?php
        }

        public static function initCard($dir, $key, $s_cat, $categories, $api){
            $id = $s_cat->ID;
?>
            <div id="<?php echo $id ?>" class="card card-sm">
                <div class="card-body media">
                    <div class="media-left">
                        <h4 class="card-title mb-0">
                            <label><?php echo $s_cat->title ?></label>
                        </h4>
                        <div class="d-flex align-items-center py-1">
                            <small class="text-secondary mr-2"><strong>ID:</strong> <?php echo $id ?></small class="text-muted"><br>
                            <small class="text-secondary"><strong>หมวดหมู่แม่:</strong> <?php self::initParent($s_cat->parentID, $categories) ?></small class="text-muted">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <!--<a href="<?php Nav::echoURL($dir, App::$pageAdminManageCategoriesCourses) ?>" class="btn btn-white btn-sm float-left"><i class="material-icons btn__icon--left">playlist_add_check</i> ดูคอร์สที่เกี่ยวข้อง <span class="badge badge-dark ml-2"><?php echo '0'; ?></span></a>-->
                    <a class="btn btn-primary btn-sm float-right" href="<?php Nav::echoURL($dir, App::$pageAdminAddCategories . "?id=$id") ?>"><i class="material-icons btn__icon--left">edit</i>Edit</a>
                    <button onclick="confirmDelete('<?php Nav::echoURL($dir, App::$routeAdminCategory . '?m=delete&id=' . $id) ?>');" class="btn btn-default btn-sm float-right" style="margin-right: 8px"><i class="material-icons btn__icon--left">delete_forever</i> ลบ </button>
                    <div class="clearfix"></div>
                </div>
            </div>
<?php
        }

        private static function initParent($parentID, $categories){
            foreach ($categories as $key => $value) {
                if($parentID == $value->ID){
                    echo $value->title;
                }
            }
        }

        private static function countByCategory($api, $id){
            $filter = new StdClass();
            $filter->categoryID = $id;

            $result = FunCourse::countFiltered($api, $filter);
            return $result->response;
        }
    }