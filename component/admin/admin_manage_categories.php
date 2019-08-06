<?php
    class AdminManageCategoriesView{
        public static function initView($dir, $paths, $categories,$pages){
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
                                    <?php NavPath::initNavPath($dir, $paths) ?>

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">Manage Categories</h1>
                                        </div>
                                        <div class="media-right">
                                            <a href="<?php Nav::echoURL($dir, App::$pageAdminAddCategories) ?>" class="btn btn-success" style="margin-right: 4px">Add Category</a>
                                        </div>
                                    </div>

                                    <div class="card-columns">
                                        <!-- Category Card -->
                                        <?php 
                                            foreach ($categories as $key => $value) {
                                                self::initCard($dir, $key, $value, $categories);
                                            }
                                        ?>
                                    </div>
                                </div>
                                <?php Pagination::initPagination($dir, $pages) ?>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?> 
                
                <!-- Custom Script -->
                <?php Script::customScript($dir, 'admin-manage-category.js') ?>

<?php
        }

        public static function initCard($dir, $key, $s_cat, $categories){
            $id = $s_cat->ID;
?>
            <div id="<?php echo $id ?>" class="card card-sm">
                <div class="card-body media">
                    <div class="media-left">
                        <h4 class="card-title mb-0">
                            <label>Title: <input id="title" class="form-control" value="<?php echo $s_cat->title ?>"></label>
                        </h4>
                        <div class="form-group">
                            <label for="masterID" class="form-label">Parent</label><br>
                            <select id="masterID" class="form-control custom-select" style="width: 200px">
                                <?php self::initSelect($dir, $s_cat->masterID, $categories) ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="instructor-review-quiz.html" class="btn btn-white btn-sm float-left"><i class="material-icons btn__icon--left">playlist_add_check</i> View Courses <span class="badge badge-dark ml-2">5</span></a>
                    <button class="btn btn-primary btn-sm float-right" onclick="update(<?php echo $id ?>)"><i class="material-icons btn__icon--left">edit</i> Update </button>
                    <button onclick="return confirm('Are you sure?');" class="btn btn-default btn-sm float-right" style="margin-right: 8px"><i class="material-icons btn__icon--left">delete_forever</i> Delete </button>
                    <div class="clearfix"></div>
                </div>
            </div>
<?php
        }

        public static function initSelect($dir, $masterID, $categories){
?>
            <option value="">-</option>
<?php
            foreach ($categories as $key => $value) {
                if($masterID != $value->ID){
?>
                    <option value="<?php echo $value->ID ?>"><?php echo $value->title ?></option>
<?php
                }else{
?>
                    <option value="<?php echo $value->ID ?>" selected><?php echo $value->title ?></option>    
<?php
                }
            }
        }
    }