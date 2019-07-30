<?php
    class ForgotPasswordView{ //login HTML elements loader

        public static function initView($dir){
?>

            <body class="login">
                <div class="d-flex align-items-center" style="min-height: 100vh">
                    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px">
                        <div class="text-center mt-5 mb-1">
                            <div class="avatar avatar-lg">
                                <img src="<?php Asset::echoIcon($dir, $dir . Asset::$iconURL) ?>" class="avatar-img rounded-circle" alt="LearnPlus" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-5 navbar-light">
                            <a href="student-dashboard.html" class="navbar-brand m-0"><?php echo App::$name ?></a>
                        </div>
                        <div class="card navbar-shadow">
                            <div class="card-header text-center">
                                <h4 class="card-title">Forgot Password?</h4>
                                <p class="card-subtitle">Recover your account password</p>
                            </div>
                            <div class="card-body">

                                <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex" role="alert">
                                    <i class="material-icons text-success mr-3">check_circle</i>
                                    <div class="text-body">An email with password reset instructions has been sent to your email address, if it exists on our system.</div>
                                </div>

                                <form action="<?php Nav::echoURL($dir,App::$pageResetPassword)?>" novalidate="" method="get">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email address:</label>
                                        <div class="input-group input-group-merge">
                                            <input id="email" type="email" required="" class="form-control form-control-prepended" placeholder="Your email address">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="far fa-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Send instructions</button>
                                </form>
                            </div>
                            <div class="card-footer text-center text-black-50">Remember your password? <a href="<?php Nav::echoURL($dir, App::$pageLogin); ?>">Login</a></div>
                        </div>
                    </div>
                </div>
                
                <?php Script::initScript($dir) ?>
<?php
        }

    }