<?php
    class ResetPasswordView{ //login HTML elements loader

        public static function initView($dir, $tokenID){
?>
            <body class="login">
                <div class="d-flex align-items-center" style="min-height: 100vh">
                    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px">
                        <div class="text-center mt-5 mb-1">
                            <div class="avatar avatar-lg">
                                <img src="<?php Asset::embedIcon($dir, Asset::$iconURL) ?>" class="avatar-img rounded-circle" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-5 navbar-light">
                            <a href="student-dashboard.html" class="navbar-brand m-0"><?php echo App::$name ?></a>
                        </div>
                        <div class="card navbar-shadow">
                            <div class="card-header text-center">
                                <h4 class="card-title">Forgot Password?</h4>
                                <p class="card-subtitle">Reset your account password</p>
                            </div>
                            <div class="card-body">

                                <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex" role="alert">
                                    <div class="text-body">Please set you new password and confirm it.</div>
                                </div>

                                <form action="<?php Nav::echoURL($dir, App::$routeRecovery . "?m=reset&id=" . $tokenID) ?>" method="POST">
                                    <div class="form-group">
                                        <label class="form-label" for="password">Password:</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password" id="password" type="password" required="" class="form-control form-control-prepended" placeholder="Choose new a password" onchange="checkPass()" minlength="6" required>
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
                                            <input name="password2" id="password2" type="password" required="" class="form-control form-control-prepended" placeholder="Confirm new password" onchange="checkPass()" minlength="6" required>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fas fa-key"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <small id="err-pass" class="text-danger">password not matching!</small>
                                    </div>
                                        <button id="btn-reset" type="submit" class="btn btn-primary btn-block" disabled>Reset Password</button>
                                </form>
                            </div>
                            <div class="card-footer text-center text-black-50">Remember your password? <a href="<?php Nav::echoURL($dir, App::$pageLogin); ?>">Login</a></div>
                        </div>
                    </div>
                </div>
                
                <?php Script::initScript($dir) ?>

                <script>
                    $('#err-pass').hide();

                    function checkPass(){
                        var btn = document.querySelector('#btn-reset');
                    
                        if($('#password').val() == $('#password2').val()){
                            btn.disabled = false;
                            $('#err-pass').hide();
                        }else{
                            btn.disabled = true;
                            $('#err-pass').show();
                        }
                    }
                </script>
<?php
        }

    }