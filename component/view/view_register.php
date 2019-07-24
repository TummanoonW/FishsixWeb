<?php
    class RegisterView{
        public static function initView($dir){
?>
            <body class="login">
                    <!-- Flatpickr -->
                    <link type="text/css" href="assets/css/flatpickr.css" rel="stylesheet">
                    <link type="text/css" href="assets/css/flatpickr.rtl.css" rel="stylesheet">
                    <link type="text/css" href="assets/css/flatpickr-airbnb.css" rel="stylesheet">
                    <link type="text/css" href="assets/css/flatpickr-airbnb.rtl.css" rel="stylesheet">
            
            <div class="d-flex align-items-center" style="min-height: 100vh">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
                    <div class="text-center mt-5 mb-1">
                        <div class="avatar avatar-lg">
                            <img src="<?php Asset::printIcon($dir, $dir . Asset::$iconURL); ?>" class="avatar-img rounded-circle" alt="LearnPlus" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5 navbar-light">
                        <a href="<?php Nav::printURL($dir,'student-dashboard.html')?>" class="navbar-brand m-0"><?php echo App::$name ?></a>
                    </div>
                    <div class="card navbar-shadow">
                        <div class="card-header text-center">
                            <h4 class="card-title">Register</h4>
                            <p class="card-subtitle">Create a new account</p>
                        </div>
                        <div class="card-body">

                            <a href="<?php Nav::printURL($dir,'student-dashboard.html')?>" class="btn btn-light btn-block">
                                <span class="fab fa-google mr-2"></span>
                                Continue with Google
                            </a>

                            <div class="page-separator">
                                <div class="page-separator__text">or</div>
                            </div>

                            <form action="<?php Nav::printURL($dir, Nav::$pageRegisterSucceed); ?>" novalidate method="POST">
                                <div class="form-group">
                                    <label class="form-label" for="email">Email address:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="email" id="email" type="email" required="" class="form-control form-control-prepended" placeholder="Your email address">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="fname">Frist name:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="fname" id="fname" type="text" required="" class="form-control form-control-prepended" placeholder="Your first name">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="lname">Last name:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="lname" id="lname" type="text" required="" class="form-control form-control-prepended" placeholder="Your last name">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Flatpickr -->
                                <div class="form-group">
                                        <label class="form-label" for="bdate">Birth Date:</label>
                                        <input id="bdate" type="hidden" class="form-control flatpickr-input" data-toggle="flatpickr" value="2019-07-24">
                                </div>

                                <div class="form-group">
                                        <label class="form-label" for="gender">Gender:</label>
                                        <select id="gender" class="form-control custom-select">
                                            <option selected="">Your gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Memale</option>
                                        </select>
                                        
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="address">Address:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="address" id="address" type="text" required="" class="form-control form-control-prepended" placeholder="Your address">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-thumbtack"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">Password:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="password" id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Choose a password">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-key"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password2">Confirm Password:</label>
                                    <div class="input-group input-group-merge">
                                        <input id="password2" type="password" required="" class="form-control form-control-prepended" placeholder="Confirm password">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-key"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
                                <div class="form-group text-center mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input id="terms" type="checkbox" class="custom-control-input" checked required="">
                                        <label for="terms" class="custom-control-label text-black-70">I agree to the <a href="#" class="text-black-70" style="text-decoration: underline;">Terms of Use</a></label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center text-black-50">Already signed up? <a href="<?php Nav::printURL($dir, Nav::$pageLogin); ?>">Login</a></div>
                    </div>
                </div>
            </div>
            <?php Script::initScript($dir); ?>
                <!-- Flatpickr -->
                <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
                <script src="assets/js/flatpickr.js"></script>
<?php
        }
    }

?>