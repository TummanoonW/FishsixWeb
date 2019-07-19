<?php
    class AdminManageCategoriesView{
        public static function initView($dir, $paths, $categories){
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

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">Manage Categories</h1>
                                        </div>
                                        <div class="media-right">
                                            <a href="#" class="btn btn-success" style="margin-right: 4px;">Add Category</a>
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
                            </div>
                            <?php Sidemenu::initSideMenu($dir); ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir); ?> 


<?php
        }

        public static function initCard($dir, $key, $s_cat, $categories){
?>
            <div class="card card-sm">
                <div class="card-body media">
                    <div class="media-left">
                        <h4 class="card-title mb-0">
                            <label>Title: <input class="form-control" value="<?php echo $s_cat->title ?>"></label>
                        </h4>
                        <div class="form-group">
                            <label for="custom-select" class="form-label">Parent</label><br>
                            <select id="custom-select" class="form-control custom-select" style="width: 200px;">
                                <?php self::initSelect($dir, $s_cat, $categories); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="instructor-review-quiz.html" class="btn btn-white btn-sm float-left"><i class="material-icons btn__icon--left">playlist_add_check</i> View Courses <span class="badge badge-dark ml-2">5</span></a>
                    <a href="instructor-quiz-edit.html" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i> Update </a>
                    <a href="instructor-quiz-edit.html" class="btn btn-default btn-sm float-right" style="margin-right: 8px;"><i class="material-icons btn__icon--left">delete_forever</i> Delete </a>
                    <div class="clearfix"></div>
                </div>
            </div>
<?php
        }

        public static function initSelect($dir, $s_cat, $categories){
?>
            <option value="">-</option>
<?php
            foreach ($categories as $key => $value) {
                if($s_cat->ID != $value->ID){
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