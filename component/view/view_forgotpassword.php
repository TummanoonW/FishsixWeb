<?php
    class ForgotPasswordView{ //login HTML elements loader

        public static function initView($dir, $sess, $show){
?>

            <body class="login">
                <div class="d-flex align-items-center" style="min-height: 100vh">
                    <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px">
                        <div class="text-center mt-5 mb-1">
                            <div class="avatar avatar-lg">
                                <img src="<?php Asset::embedIcon($dir, Asset::$iconURL) ?>" class="avatar-img rounded-circle" alt="Fishsix" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-5 navbar-light">
                            <a href="student-dashboard.html" class="navbar-brand m-0"><?php echo App::$name ?></a>
                        </div>
                        <div class="card navbar-shadow">
                            <div class="card-header text-center">
                                <h4 class="card-title">ลืมรหัสผ่าน?</h4>
                                <p class="card-subtitle">คุณสามารถตั้งรหัสผ่านใหม่ได้</p>
                            </div>
                            <div class="card-body">
                                <?php if($show){ ?>
                                    <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex" role="alert">
                                        <i class="material-icons text-success mr-3">check_circle</i>
                                        <div class="text-body">เรากำลังส่งคู่มือการตั้งรหัสผ่านใหม่และลิงค์ ไปยังอีเมลของคุณ ภายใน 10 นาที. หากอีเมลของคุณมีอยู่ในระบบบัญชีของเรา</div>
                                    </div>
                                    <a class="btn btn-primary" href="<?php Nav::echoHome($dir) ?>"><i class="fas fa-home mr-2"></i>กลับไปหน้าหลัก</a>
                                <?php }else{ ?>
                                    <form action="<?php Nav::echoURL($dir, App::$routeRecovery . "?m=forget") ?>" method="POST">
                                        <div class="form-group">
                                            <label class="form-label" for="email">อีเมล บัญชีของคุณ:</label>
                                            <div class="input-group input-group-merge">
                                                <input name="email" id="email" type="email" class="form-control form-control-prepended" placeholder="กรอกอีเมล ที่คุณเคยสมัคร" required>
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <span class="far fa-envelope"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">ส่งคู่มือและลิงค์</button>
                                    </form>
                                <?php } ?>
                            </div>
                            <div class="card-footer text-center text-black-50">จำรหัสผ่านคุณได้แล้วใช่ไหม? <a href="<?php Nav::echoURL($dir, App::$pageLogin); ?>">เข้าสู่ระบบ</a> เลย</div>
                        </div>
                    </div>
                </div>
                
                <?php Script::initScript($dir) ?>
<?php
        }

    }