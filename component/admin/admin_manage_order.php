<?php
    class AdminManageOrderView{
        public static function initView($dir, $paths, $pages){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
            <style>
                #overlay {
                  position: fixed; /* Sit on top of the page content */
                  display: none; /* Hidden by default */
                  width: 100%; /* Full width (cover the whole page) */
                  height: 100%; /* Full height (cover the whole page) */
                  top: 0; 
                  left: 0;
                  right: 0;
                  bottom: 0;
                  background-color: rgba(0,0,0,0.5); /* Black background with opacity */
                  z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
                  cursor: pointer; /* Add a pointer on hover */
                }
                #slip{
                    margin: auto;
                    position: absolute;
                    left: 0;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    transform: scale(0.65);
                }
            </style>

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
                                            <h1 class="h2">Manage Order</h1>
                                        </div> 
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
                                                                    <option selected value="allorder">All Orders</option>
                                                                    <option value="pending">Pending</option>
                                                                    <option value="complete">Complete</option>
                                                                    <option value="fixing">Fixing</option>
                                                                    <option value="cancel">Cancel</option>
                                                                </select>
                                                            </div>
                                                            <a href="#">Clear filters</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex search-form ml-3 search-form--light">
                                                    <input type="text" class="form-control" placeholder="Search Order" id="searchSample02">
                                                    <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10 Order</small>
                                                <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                    <small class="text-muted text-uppercase mr-3 d-none d-sm-block">Sort by</small>
                                                    <a href="#" class="sort small text-uppercase ml-2">Course name</a>
                                                    <a href="#" class="sort small text-uppercase ml-2">Date</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <!-- Order Card -->
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column flex-sm-row">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Slip</th>
                                                                    <th>Course name</th>
                                                                    <th>User name</th>
                                                                    <th>Purchase date</th>
                                                                    <th>Total</th>
                                                                    <th>Status</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="list" id="search">
                                                                <tr>
                                                                    <td>
                                                                        <div class="avatar avatar-sm mr-3">
                                                                            <img src="<?php Asset::echoThumb($dir,'assets/images/thumbs/def.png') ?>" alt="Avatar" onclick="on()" class="avatar-img rounded">
                                                                        </div>
                                                                        <div id="overlay" onclick="off()" >
                                                                            <img src="https://f.ptcdn.info/190/051/000/oq150qolm3LZO5bVaF5-o.jpg" id="slip" alt="">                                                                           
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Learn VueJs</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="js-lists-values-employee-name">Kalum Atherton</span>
                                                                    </td>
                                                                    <td><small>19/8/2019</small></td>
                                                                    <td>$40</td>
                                                                    <td>Pending</td>
                                                                    <td>
                                                                        <a href="" class="text-muted" data-caret="false" data-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="">See more</a>
                                                                            <a class="dropdown-item" href="">Permit</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Send back</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Cancel</a>
                                                                            <a class="dropdown-item" href="">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="avatar avatar-sm mr-3">
                                                                            <img src="<?php Asset::echoThumb($dir,'assets/images/thumbs/def.png') ?>" alt="Avatar" onclick="on()" class="avatar-img rounded">
                                                                        </div>
                                                                        <div id="overlay" onclick="off()" >
                                                                            <img src="https://f.ptcdn.info/190/051/000/oq150qolm3LZO5bVaF5-o.jpg" id="slip" alt="">                                                                           
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span >Github Webhooks for Beginners</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="js-lists-values-employee-name">Kalum Atherton</span>
                                                                    </td>
                                                                    <td><small>15/8/2019</small></td>
                                                                    <td>$48</td>
                                                                    <td>Complete</td>
                                                                    <td>
                                                                        <a href="" class="text-muted" data-caret="false" data-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="">See more</a>
                                                                            <a class="dropdown-item" href="">Permit</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Send back</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Cancel</a>
                                                                            <a class="dropdown-item" href="">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                         <div class="avatar avatar-sm mr-3">
                                                                            <img src="<?php Asset::echoThumb($dir,'assets/images/thumbs/def.png') ?>" alt="Avatar" onclick="on()" class="avatar-img rounded">
                                                                        </div>
                                                                        <div id="overlay" onclick="off()" >
                                                                            <img src="https://f.ptcdn.info/190/051/000/oq150qolm3LZO5bVaF5-o.jpg" id="slip" alt="">                                                                           
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Npm & Gulp Advanced Workflow</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="js-lists-values-employee-name">Kalum Atherton</span>
                                                                    </td>
                                                                    <td><small>10/8/2019</small></td>
                                                                    <td>$38</td>
                                                                    <td>Fixing</td>
                                                                    <td>
                                                                        <a href="" class="text-muted" data-caret="false" data-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="">See more</a>
                                                                            <a class="dropdown-item" href="">Permit</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Send back</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Cancel</a>
                                                                            <a class="dropdown-item" href="">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="avatar avatar-sm mr-3">
                                                                            <img src="<?php Asset::echoThumb($dir,'assets/images/thumbs/def.png') ?>" alt="Avatar" onclick="on()" class="avatar-img rounded">
                                                                        </div>
                                                                        <div id="overlay" onclick="off()" >
                                                                            <img src="https://f.ptcdn.info/190/051/000/oq150qolm3LZO5bVaF5-o.jpg" id="slip" alt="">                                                                           
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span>Gulp & Slush Workflows</span>
                                                                    </td>
                                                                    <td>
                                                                        <span>Kalum Atherton</span>
                                                                    </td>
                                                                    <td><small>9/8/2019</small></td>
                                                                    <td>$59</td>
                                                                    <td>Cancel</td>
                                                                    <td>
                                                                        <a href="" class="text-muted" data-caret="false" data-toggle="dropdown"><i class="material-icons">more_vert</i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" href="">See more</a>
                                                                            <a class="dropdown-item" href="">Permit</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Send back</a>
                                                                            <a class="dropdown-item" onclick="return confirm('Are you sure?');" href="">Cancel</a>
                                                                            <a class="dropdown-item" href="">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
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
                <script>
                    function on() {
                          document.getElementById("overlay").style.display = "block";
                        }

                        function off() {
                          document.getElementById("overlay").style.display = "none";
                        }
                </script> 

<?php
        }
        public static function initBtn($dir){
?>
        <div>
            <div class="text-center">
                <a href="<?php Nav::echoURL($dir, App::$pageAdminEditUser) ?>" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>Edit</a>
                <button onclick="return confirm('Are you sure?');" class="btn btn-default btn-sm float-right" style="margin-right:8px;" ><i class="material-icons btn__icon--left">delete_forever</i>Delete</button>
            </div>
        </div>
<?php
        }

    }
?>
            