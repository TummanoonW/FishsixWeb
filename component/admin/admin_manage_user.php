<?php
    class AdminManageUserView{
        public static function initView($dir, $paths, $pages, $auths, $count, $search){
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
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">Manage User</h1>
                                        </div> 
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminAddUser) ?>" class="btn btn-success">+ Add user</a>
                                    </div>

                                    <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                        <form action="#">
                                            <div class="d-flex flex-wrap2 align-items-center mb-headings">
                                                <select name="type" id="custom-select" class="form-control custom-select" style="width: 120px" onchange="searchType(this)">
                                                    <?php
                                                        $x = '';
                                                        $u = '';
                                                        $t = '';
                                                        $a = '';
                                                        switch($search->type){
                                                            case 'user':
                                                                $u = 'selected';
                                                                break;
                                                            case 'teacher':
                                                                $t = 'selected';
                                                                break;
                                                            case 'admin':
                                                                $a = 'selected';
                                                                break;
                                                            default:
                                                                $x = 'selected';
                                                                break;
                                                        }
                                                    ?>
                                                    <option value="" <?php echo $x ?>>All Users</option>
                                                    <option value="user" <?php echo $u ?>>Users</option>
                                                    <option value="teacher" <?php echo $t ?>>Teachers</option>
                                                    <option value="admin" <?php echo $a ?>>Admins</option>
                                                </select>
                                                <div class="flex search-form ml-3 search-form--light">
                                                    <input name="query" id="query" type="text" class="form-control" placeholder="Search user" id="searchSample02" value="<?php echo $search->query ?>">
                                                    <button onclick="searchQuery()" class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">Displaying <?php echo count($auths) ?> out of <?php echo $count ?> Users</small>
                                                <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                    <small class="text-muted text-uppercase mr-3 d-none d-sm-block">Sort by</small>
                                                    <?php 
                                                          if($search->desc){ 
                                                    ?>
                                                            <a href="#" onclick="searchDesc(false)" class="sort small text-uppercase ml-2">Z - A</a>
                                                    <?php }else{ 
                                                    ?>
                                                            <a href="#" onclick="searchDesc(true)" class="sort small text-uppercase ml-2">A - Z</a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Alert -->
                                    <?php if(count($auths) == 0)Alert::initAlert($dir, "Ohh no! No user to display.") ?>
                                    <!-- User Card -->
                                    <div class="row">
                                        <?php self::initCards($dir, $auths) ?>
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
                <!-- Custom Script -->
                <?php Script::customScript($dir, 'common.js') ?>
                <script id="q">
                    <?php echo json_encode($search) ?>
                </script>
                <script>
                    var q = JSON.parse(document.querySelector('#q').innerHTML);

                    function search(){
                        let param = JSON.stringify(q);
                        window.location = "<?php Nav::echoURL($dir, App::$pageAdminManageUser) ?>" + "?q=" + param;
                    }

                    function searchType(element){
                        q.type = element.value;
                        search();
                    }

                    function searchQuery(){
                        let element = document.querySelector('#query');
                        q.query = element.value;
                        search();
                    }

                    function searchDesc(isDesc){
                        q.desc = isDesc;
                        search();
                    }

                    var input = document.querySelector('#query');
                    input.addEventListener("keyup", function(event) {
                        // Number 13 is the "Enter" key on the keyboard
                        if (event.keyCode === 13) {
                          // Cancel the default action, if needed
                          event.preventDefault();
                          // Trigger the button element with a click
                          searchQuery();
                        }
                    });
                </script>

<?php
        }

        private static function initCards($dir, $auths){
            foreach ($auths as $key => $auth) {
                $id = $auth->ID;
?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column flex-sm-row">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminAddUser . "?id=$id") ?>" class="avatar avatar-lg avatar-4by3 mb-3 w-xs-plus-down-100 mr-sm-3 h-auto">
                                    <img src="<?php Asset::echoIcon($dir, $auth->profile_pic) ?>" alt="<?php echo $auth->username ?>" class="avatar-img rounded-circle">
                                </a>
                                <div class="flex" style="min-width: 200px">
                                    <h4 class="card-title mb-1"><a href="<?php Nav::echoURL($dir, App::$pageAdminEditUser . "?id=$id") ?>"><?php echo $auth->username ?></a></h4>
                                    <span>ID: <?php echo $id ?></span><br>
                                    <span>Email: <?php echo $auth->email ?></span> 
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?php Nav::echoURL($dir, App::$pageAdminAddUser . "?id=$id") ?>" class="btn btn-primary btn-sm float-right ml-2"><i class="material-icons btn__icon--left">edit</i>Edit</a>
                            <button onclick="confirmDelete('<?php Nav::echoURL($dir, App::$routeAdminUser . '?m=delete&id=' . $id) ?>');" class="btn btn-default btn-sm float-right"><i class="material-icons btn__icon--left">delete_forever</i>Delete</button>
                        </div>
                    </div>
                </div>
<?php
            }
        }
    }

            