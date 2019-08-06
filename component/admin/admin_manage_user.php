<?php
    class AdminManageUserView{
        public static function initView($dir, $paths, $pages){
            $auth = Session::getAuth();
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

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">Manage User</h1>
                                        </div> 
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminAddUser) ?>" class="btn btn-success">Add user</a>
                                    </div>

                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="d-flex flex-wrap2 align-items-center mb-headings">
                                                <div class="dropdown">
                                                    <a href="#" data-toggle="dropdown" class="btn btn-white"><i class="material-icons mr-sm-2">tune</i> <span class="d-none d-sm-block">Filters</span></a>
                                                    <div class="dropdown-menu">
                                                        <div class="dropdown-item d-flex flex-column">
                                                            <div class="form-group">
                                                                <label for="custom-select" class="form-label">Status</label><br>
                                                                <select id="custom-select" class="form-control custom-select" style="width: 200px">
                                                                    <option selected>All User</option>
                                                                    <option value="students">Students</option>
                                                                    <option value="teachers">Teachers</option>
                                                                    <option value="admin">Admin</option>
                                                                </select>
                                                            </div>
                                                            <a href="#">Clear filters</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex search-form ml-3 search-form--light">
                                                    <input type="text" class="form-control" placeholder="Search User" id="searchSample02">
                                                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10 User</small>
                                                <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                    <small class="text-muted text-uppercase mr-3 d-none d-sm-block">Sort by</small>
                                                    <a href="#" class="sort small text-uppercase ml-2">A - Z</a>
                                                    <a href="#" class="sort small text-uppercase ml-2">Newest</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Alert -->
                                    <?php Alert::initAlert($dir, "Ohh no! No user to display.") ?>
                                    <!-- User Card -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <a href="../admin/edit-user.php" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                            <img src="../assets/images/thumbs/def.png" alt="Learn English 101 for Business" class="avatar-img rounded">
                                                        </a>
                                                        <div class="flex" style="min-width: 200px">
                                                            <h4 class="card-title mb-1"><a href="../admin/edit-user.php">User Name No:1</a></h4>
                                                            <p class="text-black-70"><br>
                                                            <span>UserID: 001</span><br>
                                                            <span>Mr.Ocha Ohyeah</span> 
                                                            </p>
                                                            <?php self::initBtn($dir); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <a href="../admin/edit-user.php" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                            <img src="../assets/images/thumbs/def.png" alt="Learn English 101 for Business" class="avatar-img rounded">
                                                        </a>
                                                        <div class="flex" style="min-width: 200px">
                                                            <h4 class="card-title mb-1"><a href="../admin/edit-user.php">User Name No:2</a></h4>
                                                            <p class="text-black-70"><br>
                                                            <span>UserID: 002</span><br>
                                                            <span>Mr.Ocha Ohyeah</span> 
                                                            </p>
                                                            <?php self::initBtn($dir); ?>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <a href="../admin/edit-user.php" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                            <img src="../assets/images/thumbs/def.png" alt="Learn English 101 for Business" class="avatar-img rounded">
                                                        </a>
                                                        <div class="flex" style="min-width: 200px">
                                                            <h4 class="card-title mb-1"><a href="../admin/edit-user.php">User Name No:3</a></h4>
                                                            <p class="text-black-70"><br>
                                                            <span>UserID: 003</span><br>
                                                            <span>Mr.Ocha Ohyeah</span> 
                                                            </p>
                                                            <?php self::initBtn($dir); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <a href="../admin/edit-user.php" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3">
                                                            <img src="../assets/images/thumbs/def.png" alt="Learn English 101 for Business" class="avatar-img rounded">
                                                        </a>
                                                        <div class="flex" style="min-width: 200px">
                                                            <h4 class="card-title mb-1"><a href="../admin/edit-user.php">User Name No:4</a></h4>
                                                            <p class="text-black-70"><br>
                                                            <span>UserID: 004</span><br>
                                                            <span>Mr.Ocha Ohyeah</span> 
                                                            </p>
                                                            <?php self::initBtn($dir); ?>
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
                <a href="../admin/edit-user.php" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>Edit</a>
                <button onclick="return confirm('Are you sure?');" class="btn btn-default btn-sm float-right" style="margin-right:8px;" ><i class="material-icons btn__icon--left">delete_forever</i>Delete</button>
            </div>
        </div>
        

<?php
        }

    }
?>
            