<?php
    class RegisterView{
        public static function initView($dir, $err){
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
                            <img src="<?php Asset::embedIcon($dir, Asset::$iconURL) ?>" class="avatar-img rounded-circle" alt="Fishsix" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5 navbar-light">
                        <a href="<?php Nav::echoHome($dir) ?>" class="navbar-brand m-0"><?php echo App::$name ?></a>
                    </div>
                    <div class="card navbar-shadow">
                        <div class="card-header text-center">
                            <h4 class="card-title">สมัครสมาชิก</h4>
                            <p class="card-subtitle">สร้างบัญชีผู้ใช้ของคุณ</p>
                        </div>
                        <div class="card-body">

                            <a href="#" class="btn btn-light btn-block">
                                <span class="fab fa-google mr-2"></span>
                                สมัครด้วยบัญชี Google
                            </a>

                            <div class="page-separator">
                                <div class="page-separator__text">หรือ</div>
                            </div>

                            <form action="<?php Nav::echoURL($dir, App::$routeRegister); ?>" method="POST">
                                <div class="form-group">
                                    <label class="form-label" for="email">อีเมล:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="email" id="email" type="email" class="form-control form-control-prepended" placeholder="Your email address" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">รหัสผ่าน:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="password" id="password" type="password" class="form-control form-control-prepended" placeholder="Choose a password" onchange="" minlength="6" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-key"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password2">รหัสผ่านอีกครั้ง:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="password2" id="password2" type="password" class="form-control form-control-prepended" placeholder="Confirm password" onchange="" minlength="6" required>
                                        <?php if($err == 'p2'){ ?>
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fas fa-key"></span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <small id="err-pass" class="text-danger">รหัสผ่านทั้ง 2 ช่องไม่ตรงกัน!</small>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="username">ชื่อผู้ใช้งาน:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="username" id="username" type="text" class="form-control form-control-prepended" placeholder="Your User name" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-separator">
                                    <div class="page-separator__text">ข้อมูลผู้ใช้ เบื้องต้น</div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="fname">ชื่อจริง:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="fname" id="fname" type="text" class="form-control form-control-prepended" placeholder="Your first name" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="lname">นามสกุล:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="lname" id="lname" type="text" class="form-control form-control-prepended" placeholder="Your last name" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Flatpickr -->
                                <div class="form-group">
                                        <label class="form-label" for="bdate">วันเกิด:</label>
                                        <input name="bdate" id="bdate" type="hidden" class="form-control flatpickr-input" data-toggle="flatpickr">
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="gender">เพศ:</label>
                                    <select name="gender" id="gender" class="form-control custom-select">
                                        <option selected="">-</option>
                                        <option value="male" >ชาย</option>
                                        <option value="female">หญิง</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="address">ที่อยู่ปัจจุบัน:</label>
                                    <div class="input-group input-group-merge">
                                        <input name="address" id="address"  type="text" class="form-control form-control-prepended" placeholder="Your address">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fas fa-thumbtack"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- jQuery Mask Plugin -->
                                <div class="form-group">
                                    <label class="form-label" for="phone">เบอร์โทรศัพท์:</label>
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="123-456-7890" data-mask="000-000-0000" autocomplete="off" maxlength="12">
                                </div>

                                <button type="submit" id="btn-register" class="btn btn-primary btn-block mb-3" disabled>สมัคร</button>
                                <div class="form-group text-center mb-0">
                                    <div class="custom-control custom-checkbox">
                                        <input name="terms" id="terms" type="checkbox" class="custom-control-input" checked required="">
                                        <label for="terms" class="custom-control-label text-black-70">ฉันยอมรับข้อตกลง <a href="#" class="text-black-70" style="text-decoration: underline;">ข้อตกลงการใช้งาน</a></label>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center text-black-50">คุณสมัครสมาชิกแล้วใช่ไหม ? <a href="<?php Nav::echoURL($dir, App::$pageLogin) ?>">เข้าสู่ระบบ</a> เลย</div>
                    </div>
                </div>
            </div>

            <?php Script::initScript($dir); ?>
                <!-- Flatpickr -->
                <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
                <script src="assets/js/flatpickr.js"></script>
                <!-- jQuery Mask Plugin -->
                <script src="assets/vendor/jquery.mask.min.js"></script>

                <script>
                    
                    $('#err-pass').hide();

                    function checkPass(){
                        var btn = document.querySelector('#btn-register');

                        if($('#password').val() == $('#password2').val()){
                            btn.disabled = false;
                            $('#err-pass').hide();
                        }else{
                            $('#btn-register').prop("disabled", false);
                            btn.disabled = true;
                            $('#err-pass').show();
                        }
                    }
                </script>
<?php
        }
    }

?>