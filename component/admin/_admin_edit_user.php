<?php
    class AdminEditUserView{ ////profile HTML elements loader

        public static function initView($dir, $sess, $paths){
            $auth = $sess->getAuth();
?>
            <body class=" layout-fluid">
                <!-- Flatpickr -->
                <link type="text/css" href="assets/css/flatpickr.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr.rtl.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr-airbnb.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr-airbnb.rtl.css" rel="stylesheet">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir, '', $sess) ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <h1 class="h2">Edit User's account</h1>

                                    <div class="card">
                                        <ul class="nav nav-tabs nav-tabs-card">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#first" data-toggle="tab">User's account</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="./edit-user.php" method="POST" class="form-horizontal">

                                                    <div class="form-group row">
                                                            <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="material-icons md-18 text-muted">mail</i>
                                                                        </div>
                                                                    </div>
                                                                <input type="text" id="email" class="form-control" placeholder="Email Address" value="<?php echo $auth->email ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="username" class="col-sm-3 col-form-label form-label">Username</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="username" id="username" type="text" class="form-control" placeholder="User's username" value="<?php echo $auth->username ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="avatar" class="col-sm-3 col-form-label form-label">Avatar</label>
                                                        <div class="col-sm-9">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <div class="icon-block rounded">
                                                                        <i class="material-icons text-muted-light md-36">photo</i>
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="custom-file" style="width: auto;">
                                                                        <input type="file" id="avatar" class="custom-file-input">
                                                                        <label for="avatar" class="custom-file-label">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 col-form-label form-label">First name</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="fname" id="fname" type="text" class="form-control" placeholder="User's first name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 col-form-label form-label">Last name</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lname" id="lname" type="text" class="form-control" placeholder="User's last name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Flatpickr -->
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="bdate">Birth Date:</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input id="bdate" type="hidden" class="form-control flatpickr-input" data-toggle="flatpickr">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label form-label" for="gender">Gender</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                 <select id="gender" class="form-control custom-select">
                                                                     <option selected="">User's gender</option>
                                                                     <option value="male" >Male</option>
                                                                     <option value="female">Female</option>
                                                                     <option value="alternative">Alternative sex</option>
                                                                 </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="address">Address</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="address" id="address"  type="text" class="form-control" placeholder="User's address">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- jQuery Mask Plugin -->
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="phone">Phone</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                <input id="phone" type="text" class="form-control" placeholder="123-456-7890" data-mask="000-000-0000" autocomplete="off" maxlength="12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="facebook" class="col-sm-3 col-form-label form-label">Facebook</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="facebook" id="facebook" type="url" class="form-control" placeholder="User's facebook url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lineid" class="col-sm-3 col-form-label form-label">LineID</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lineid" id="lineid" type="text" class="form-control" placeholder="User's LineID">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">Save change</button>
                                                                    <a href="../admin/manage-user.php" style="margin-left:8px;" class="btn btn-danger">Cancel</a>
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
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                    <!-- Flatpickr -->
                    <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
                    <script src="assets/js/flatpickr.js"></script>
                    <!-- jQuery Mask Plugin -->
                    <script src="assets/vendor/jquery.mask.min.js"></script>
<?php
        }

    }