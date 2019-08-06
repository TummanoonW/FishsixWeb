<?php
    class AdminAddCategoriesView{
        public static function initView($dir, $paths){
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
                                            <h1 class="h2">Add Categories</h1>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="./add-categories.php" method="POST" class="form-horizontal">
                                                    <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label form-label">Title</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" id="title" class="form-control" placeholder="Title name" value="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="parent" class="col-sm-3 col-form-label form-label">Parent</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="parent" id="parent" type="text" class="form-control" placeholder="Parent name" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Course1" class="col-sm-3 col-form-label form-label">Course 1</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="Course1" id="Course1" type="text" class="form-control" placeholder="Course name" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="Course2" class="col-sm-3 col-form-label form-label">Course 2</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="Course2" id="Cours2" type="text" class="form-control" placeholder="Course name" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="Course3" class="col-sm-3 col-form-label form-label">Course 3</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="Course3" id="Course3" type="text" class="form-control" placeholder="Course name" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">Add User</button>
                                                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminManageCategories); ?>"style="margin-left:8px;" class="btn btn-danger">Cancel</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php Sidemenu::initSideMenu($dir) ?>
                    </div>
                </div>
            <?php Script::initScript($dir) ?> 
<?php
        }
    }
?>