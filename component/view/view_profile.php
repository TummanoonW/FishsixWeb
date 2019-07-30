<?php
    class ProfileView{ ////profile HTML elements loader

        public static function initView($dir, $paths){
            $auth = Session::getAuth();
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

                    <?php Toolbar::initToolbar($dir) ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php NavPath::initNavPath($dir, $paths) ?>

                                    <h1 class="h2">Edit Account</h1>

                                    <div class="card">
                                        <ul class="nav nav-tabs nav-tabs-card">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#first" data-toggle="tab">Account</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#second" data-toggle="tab">Billing</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="./route/profile.php" method="POST" class="form-horizontal">

                                                    <div class="form-group row">
                                                            <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                                                            <div class="col-sm-6 col-md-6">
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
                                                                    <input name="username" id="username" type="text" class="form-control" placeholder="Your username" value="<?php echo $auth->username ?>">
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
                                                                    <input name="fname" id="fname" type="text" class="form-control" placeholder="Your first name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 col-form-label form-label">Last name</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lname" id="lname" type="text" class="form-control" placeholder="Your last name">
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
                                                                     <option selected="">Your gender</option>
                                                                     <option value="male" >Male</option>
                                                                     <option value="female">Memale</option>
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
                                                                    <input name="address" id="address"  type="text" required="" class="form-control" placeholder="Your address">
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
                                                                    <input name="facebook" id="facebook" type="url" class="form-control" placeholder="Your facebook url">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lineid" class="col-sm-3 col-form-label form-label">LineID</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lineid" id="lineid" type="text" class="form-control" placeholder="Your LineID">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                              
                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                                </div>
                                                                <div class="media-body pl-1">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input id="subscribe" type="checkbox" class="custom-control-input" checked>
                                                                        <label for="subscribe" class="custom-control-label">Subscribe to Newsletter</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <form action="<?php Nav::printURL($dir, Nav::$routeLogOut); ?>" method="POST" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-danger">Log Out</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane" id="second">
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label for="name_on_invoice" class="col-sm-3 col-form-label form-label">Name on Invoice</label>
                                                        <div class="col-sm-6 col-md-4">
                                                            <input id="name_on_invoice" type="text" class="form-control" value="Adrian Demian">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="billing_address" class="col-sm-3 col-form-label form-label">Address</label>
                                                        <div class="col-sm-6 col-md-4">
                                                            <input id="billing_address" type="text" class="form-control" value="Sunny Street, 21, Miami, Florida">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="billing_country" class="col-sm-3 col-form-label form-label">Country</label>
                                                        <div class="col-sm-6 col-md-4">
                                                            <select id="billing_country" class="custom-control custom-select form-control">
                                                                <option value="1" selected>USA</option>
                                                                <option value="2">India</option>
                                                                <option value="3">United Kingdom</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 col-md-4 offset-sm-3">
                                                            <a href="#" class="btn btn-success"> Update Billing</a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="card mt-2">
                                                    <div class="card-header">
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <h4 class="card-title">Payment Info</h4>
                                                            </div>
                                                            <div class="media-right">
                                                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="material-icons">add</i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="card-footer p-0 list-group list-group-fit">
                                                        <li class="list-group-item active">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <span class="btn btn-primary btn-circle"><i class="material-icons">credit_card</i></span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="mb-0">**** **** **** 2422</p>
                                                                    <small>Updated on 12/02/2016</small>
                                                                </div>
                                                                <div class="media-right">
                                                                    <a href="#" class="btn btn-primary btn-sm">
                                                                        <i class="material-icons btn__icon--left">edit</i> EDIT
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <span class="btn btn-white btn-circle"><i class="material-icons">credit_card</i></span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="mb-0">**** **** **** 6321</p>
                                                                    <small class="text-muted">Updated on 11/01/2016</small>
                                                                </div>
                                                                <div class="media-right">
                                                                    <a href="#" class="btn btn-white btn-sm">
                                                                        <i class="material-icons btn__icon--left">edit</i> EDIT
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
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
                    <!-- Flatpickr -->
                    <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
                    <script src="assets/js/flatpickr.js"></script>
                    <!-- jQuery Mask Plugin -->
                    <script src="assets/vendor/jquery.mask.min.js"></script>
<?php
        }

    }