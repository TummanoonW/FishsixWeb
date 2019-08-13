<?php
    class AdminCourseEditorLessonView{

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

                                    <h1 class="h2">Add Lesson</h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$pageAdminCourseEditorLessons)?>" method="POST" class="form-horizontal">

                                                    <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label form-label">Title</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input type="text" id="title" class="form-control" placeholder="Lesson title" value="" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="description" class="col-sm-3 col-form-label form-label">Description</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea name="description" id="description" type="text" class="form-control" placeholder="Description here" value=""></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="picture" class="col-sm-3 col-form-label form-label">Preview picture</label>
                                                        <div class="col-sm-9">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <div class="icon-block rounded">
                                                                        <i class="material-icons text-muted-light md-36">photo</i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="custom-file" style="width: auto;">
                                                                        <input type="file" id="picture" class="custom-file-input">
                                                                        <label for="picture" class="custom-file-label">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">Save</button>
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