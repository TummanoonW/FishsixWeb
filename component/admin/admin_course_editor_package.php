<?php
    class AdminCourseEditorPackageView{

        public static function initView($dir, $paths){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
               

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir) ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <h1 class="h2">Add Package</h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$pageAdminCourseEditorPackage)?>" method="POST" class="form-horizontal">

                                                    <div class="form-group row">
                                                        <label for="price" class="col-sm-3 col-form-label form-label">Price(Bath)</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input type="text" id="price" class="form-control" placeholder="Set price here" value="" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="credit" class="col-sm-3 col-form-label form-label">Credit(hour)</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input type="number" id="price" class="form-control" name="quantity" min="1" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">Add package</button>
                                                                    <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>"style="margin-left:8px;" class="btn btn-danger">Cancel</a>
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
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                    
<?php
        }

    }