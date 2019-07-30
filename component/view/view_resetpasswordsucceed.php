<?php
    class ResetPasswordSucceedView{
        public static function initView($dir){
?>
           <body class="registersucceed">
           <div class="d-flex align-items-center" style="min-height: 100vh">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
                    <div class="text-center mt-5 mb-1">
                        <div class="avatar avatar-lg">
                            <img src="<?php Asset::echoIcon($dir, $dir . Asset::$iconURL); ?>" class="avatar-img rounded-circle" alt="LearnPlus" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5 navbar-light">
                        <a href="<?php Nav::echoURL($dir,'student-dashboard.html')?>" class="navbar-brand m-0">fishsix</a>
                    </div>
                    <div class="card navbar-shadow">
                        <div class="card-header text-center" >
                        <i class="far fa-check-circle" style="font-size: 100px;color:green" ></i>
                            <h2>Resetpassword Succeed!</h2>
                            <h3>Now you can login with new password</h3>
                        </div>
                        <div class="card-footer text-center text-black-50">
                           <span>
                               Back to <a href="<?php Nav::echoURL($dir, App::$pageLogin); ?>">Login </a><span id="countdown">10</span> seconds
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
            <?php Script::initScript($dir); ?>
            <script type="text/javascript">
                // Total seconds to wait
                var seconds = 10;
    
                function countdown() {
                    seconds = seconds - 1;
                    if (seconds < 0) {
                        // Chnage your redirection link here
                        window.location = "<?php Nav::printURL($dir, Nav::$pageLogin); ?>";
                    } else {
                        // Update remaining seconds
                        document.getElementById("countdown").innerHTML = seconds;
                        // Count down using javascript
                        window.setTimeout("countdown()", 1000);
                    }
                }
                // Run countdown function
                countdown();
            </script>
<?php
        }
    }

?>