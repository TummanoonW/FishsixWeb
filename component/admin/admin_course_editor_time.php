<?php
    class AdminCourseEditorTimeView{

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

                                    <h1 class="h2">Add Time</h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$pageAdminCourseEditorTime)?>" method="POST" class="form-horizontal">

                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label form-label" for="day">Day</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                 <select id="branch" class="form-control custom-select">
                                                                     <option selected="">-</option>
                                                                     <option value="monday" >Monday</option>
                                                                     <option value="tuesday" >Tuesday</option>
                                                                     <option value="wednesday" >Wednesday</option>
                                                                     <option value="thurday" >Thurday</option>
                                                                     <option value="friday" >Friday</option>
                                                                     <option value="saturday" >Saturday</option>
                                                                     <option value="sunday" >Sunday</option>
                                                                 </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label form-label" for="time">Time</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                 <select id="time" class="form-control custom-select">
                                                                     <option selected="">-</option>
                                                                     <option value="8:00-17:00" >8:00-17:00</option>
                                                                     <option value="9:00-17:00" >9:00-17:00</option>
                                                                     <option value="10:00-19:00" >10:00-19:00</option>
                                                                     <option value="16:00-19:00" >16:00-19:00</option>
                                                                     
                                                                    
                                                                 </select>
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