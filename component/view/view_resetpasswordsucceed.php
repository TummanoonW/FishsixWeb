<?php
    class ResetPasswordSucceedView{
        public static function initView($dir){
?>
           <body class="registersucceed">
           <div class="d-flex align-items-center" style="min-height: 100vh">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
                    <div class="text-center mt-5 mb-1">
                        <div class="avatar avatar-lg">
                            <img src="<?php Asset::embedIcon($dir, Asset::$iconURL); ?>" class="avatar-img rounded-circle" alt="Fishsix" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5 navbar-light">
                        <a href="<?php Nav::echoURL($dir,'student-dashboard.html')?>" class="navbar-brand m-0">fishsix</a>
                    </div>
                    <div class="card navbar-shadow">
                        <div class="card-header text-center" >
                        <i class="far fa-check-circle" style="font-size: 100px;color:green" ></i>
                            <h2>การตั้งรหัสผ่านใหม่ สำเร็จแล้ว!</h2>
                            <h3>คุณสามารถ เข้าสู่ระบบ ด้วยรหัสผ่านใหม่ได้!</h3>
                        </div>
                        <div class="card-footer text-center text-black-50">
                           <span>
                               กลับไปยังหน้า <a href="<?php Nav::echoURL($dir, App::$pageLogin); ?>">เข้าสู่ระบบ </a>(<span id="countdown">11</span>)
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
            <?php Script::initScript($dir); ?>

            <script>
                var seconds = 10;
    
                var x = setInterval(function() {
                        seconds = seconds - 1;
                        if (seconds < 0) {
                            clearInterval(x);
                            window.location = "<?php Nav::echoURL($dir, App::$pageLogin); ?>";
                        } else {
                            document.querySelector("#countdown").innerHTML = seconds;
                        }
                    }, 1000
                );

            </script>
<?php
        }
    }

?>