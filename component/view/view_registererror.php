<?php
    class RegisterErorrView{
        public static function initView($dir){
?>
           <body class="registersucceed">
           <div class="d-flex align-items-center" style="min-height: 100vh">
                <div class="col-sm-8 col-md-6 col-lg-4 mx-auto" style="min-width: 300px;">
                    <div class="text-center mt-5 mb-1">
                        <div class="avatar avatar-lg">
                            <img src="<?php Asset::printIcon($dir, $dir . Asset::$iconURL); ?>" class="avatar-img rounded-circle" alt="LearnPlus" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-5 navbar-light">
                        <a href="<?php Nav::printURL($dir,'student-dashboard.html')?>" class="navbar-brand m-0">fishsix</a>
                    </div>
                    <div class="card navbar-shadow">
                        <div class="card-header text-center" >
                        <i class="fas fa-exclamation-circle" style="font-size: 100px;color:red" ></i>
                            <h2>Register Error!</h2>
                            <h3>Please try again</h3>
                        </div>
                        <div class="card-footer text-center text-black-50">Back to <a href="<?php Nav::printURL($dir, Nav::$pageRegister); ?>">Register</a></div>
                    </div>
                </div>
            </div>
            <?php Script::initScript($dir); ?>
<?php
        }
    }

?>