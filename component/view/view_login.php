<?php
    class LoginView{ //login HTML elements loader

        public static function initView($dir){
            $urls = (object)array(
                'routeLogin' => $dir . App::$routeLogIn,
                'pageError' => $dir . App::$pageError
            );
?>

            <body class="login">
                <div class="d-flex align-items-center" style="min-height: 100vh">
                    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px">
                        <div class="text-center mt-5 mb-1">
                            <div class="avatar avatar-lg">
                                <a href="<?php Nav::echoHome($dir) ?>"><img src="<?php Asset::embedIcon($dir, Asset::$iconURL) ?>" class="avatar-img rounded-circle" alt="Fishsix" /></a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-5 navbar-light">
                            <a href="<?php Nav::echoHome($dir) ?>" class="navbar-brand m-0"><?php echo App::$name ?></a>
                        </div>
                        <div class="card navbar-shadow">
                            <div class="card-header text-center">
                                <h4 class="card-title">เข้าสู่ระบบ</h4>
                                <p class="card-subtitle">ด้วยบัญชีของคุณ</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php Nav::echoURL($dir, App::$routeLogIn . "?m=login") ?>">
                                    <div class="form-group">
                                        <label class="form-label" for="email">อีเมล ของคุณ:</label>
                                        <div class="input-group input-group-merge">
                                            <input name="email" id="email" type="email" required="" class="form-control form-control-prepended" placeholder="อีเมล ของคุณ">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="far fas-envelope"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">รหัสผ่าน ของคุณ:</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password" id="password" type="password" required="" class="form-control form-control-prepended" placeholder="รหัสผ่าน ของคุณ">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="far fas-key"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                                    </div>
                                    <div class="text-center">
                                        <a href="<?php Nav::echoURL($dir, App::$pageForgotPassword)?>" class="text-black-70" style="text-decoration: underline">ลืมรหัสผ่าน?</a>
                                    </div>
                                </form>

                                <div class="page-separator">
                                    <div class="page-separator__text">หรือ</div>
                                </div>

                                <button onclick="popupGoogleSignIn()" class="btn btn-light btn-block">
                                    <span class="fab fa-google mr-2"></span>
                                    เข้าสู่ระบบด้วย บัญชี Google
                                </button>
                            </div>
                            <div class="card-footer text-center text-black-50">
                                ยังไม่ได้เป็นสมาชิก? <a href="<?php Nav::echoURL($dir, App::$pageRegister) ?>">สมัครสมาชิก</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                
                <script id="obj-urls"><?php echo json_encode($urls) ?></script>
                <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-app.js"></script>
                <script src="https://www.gstatic.com/firebasejs/7.5.0/firebase-auth.js"></script>
                <?php Script::customScript($dir, 'init-firebase.js') ?>
                <?php Script::customScript($dir, 'login.js') ?>
<?php
        }

    }