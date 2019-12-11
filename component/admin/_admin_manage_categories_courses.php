<?php
    class AdminManageCategoriesCoursesView{
        public static function initView($dir, $paths, $pages){
            $auth = SESSION::getAuth();
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

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">View Courses</h1>
                                        </div>
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" class="btn btn-success">Add course</a>
                                    </div>

                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="d-flex flex-wrap2 align-items-center mb-headings">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-white"><i class="material-icons mr-sm-2">tune</i> <span class="d-none d-sm-block">Filters</span></a>
                                                    <div class="dropdown-menu">
                                                        <div class="dropdown-item d-flex flex-column">
                                                            <div class="form-group">
                                                                <label for="custom-select" class="form-label">Category</label><br>
                                                                <select id="custom-select" class="form-control custom-select" style="width: 200px">
                                                                    <option selected>All categories</option>
                                                                    <option value="1">Vue.js</option>
                                                                    <option value="2">Node.js</option>
                                                                    <option value="3">GitHub</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="published01" class="form-label">Published</label><br>
                                                                <select id="published01" class="form-control custom-select" style="width: 200px">
                                                                    <option selected>Published courses</option>
                                                                    <option value="1">Draft courses</option>
                                                                    <option value="3">All courses</option>
                                                                </select>
                                                            </div>
                                                            <a href="#">Clear filters</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex search-form ml-3 search-form--light">
                                                    <input type="text" class="form-control" placeholder="Search courses" id="searchSample02">
                                                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10 courses</small>
                                                <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                    <small class="text-muted text-uppercase mr-3 d-none d-sm-block">Sort by</small>
                                                    <a href="#" class="sort desc small text-uppercase">Course</a>
                                                    <a href="#" class="sort small text-uppercase ml-2">Earnings</a>
                                                    <a href="#" class="sort small text-uppercase ml-2">Sales</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <!-- Alert -->
                                    <?php Alert::initAlert($dir, "Ohh no! No courses to display. Add some courses.") ?>

                                    <div class="row">
                                        <!-- Course Card -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                            <img src="../assets/images/thumbs/def.png" alt="Card image cap" class="avatar-img rounded">
                                                        </a>
                                                        <div class="flex" style="min-width: 200px;">
                                                            <!-- <h5 class="card-title text-base m-0"><a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>"><strong>Learn Vue.js</strong></a></h5> -->
                                                            <h4 class="card-title mb-1"><a href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>">Learn Vue.js</a></h4>
                                                            <p class="text-black-70">Let’s start with a quick tour of Vue’s data binding features.</p>
                                                            <div class="d-flex align-items-end">
                                                                <div class="d-flex flex flex-column mr-3">
                                                                    <div class="d-flex align-items-center py-1 border-bottom">
                                                                        <small class="text-black-70 mr-2">$1,230/mo</small>
                                                                        <small class="text-black-50">34 SALES</small>
                                                                    </div>
                                                                    <div class="d-flex align-items-center py-1">
                                                                        <small class="text-muted mr-2">GULP</small>
                                                                        <small class="text-muted">INTERMEDIATE</small>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center">
                                                                <?php self::initBtn($dir); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="card__options dropdown right-0 pr-2">
                                                    <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                        <i class="material-icons">more_vert</i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageAdminCourseEditor) ?>">Edit course</a>
                                                        <a class="dropdown-item" href="#">Course Insights</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-danger" href="#">Delete course</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

        public static function initBtn($dir){
?>
        <div>
            <div class="text-center">
                <a href="../admin/course-editor.php" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>Edit</a>
                <button onclick="return confirm('Are you sure?');" class="btn btn-default btn-sm float-right" style="margin-right:8px;" ><i class="material-icons btn__icon--left">delete_forever</i>Delete</button>
            </div>
        </div> 
<?php
        }
    }