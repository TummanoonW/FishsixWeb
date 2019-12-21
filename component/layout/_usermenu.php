<?php
    class UserMenu{
        public static function initUserMenu($dir, $sess){
            $auth = $sess->getAuth();

            if($sess->checkUserExisted()){
?>
                <li class="nav-item dropdown ml-1 ml-md-3">
                    <?php if($auth->profile_pic == ''){ ?>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php Asset::echoIcon($dir, $auth->profile_pic) ?>" alt="Avatar" class="rounded-circle" width="40"></a>
                    <?php }else{ ?>
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php echo $auth->profile_pic ?>" alt="Avatar" class="rounded-circle" width="40"></a>
                    <?php } ?>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!--<?php //if($sess->checkUserAdmin()){ ?>
                            <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageAdminPanel) ?>">
                                <i class="material-icons">apps</i> ระบบจัดการ
                            </a>
                        <?php //} 
                            //if($sess->checkUserTeacher()){ 
                        ?>
                            <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageTeacherPanel); ?>">
                                <i class="material-icons">class</i> ระบบการสอน
                            </a>
                        <?php
                            //}
                        ?>
                        <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageMyCourses) ?>">
                            <i class="material-icons">school</i> คอร์สของฉัน
                        </a>
                        <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageMyOrders) ?>">
                            <i class="material-icons">all_inbox</i> คำสั่งซื้อของฉัน
                        </a>
                        <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageMySchedule); ?>">
                            <i class="material-icons">schedule</i> ตารางเรียน
                        </a> -->
                        <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageProfile) ?>">
                            <i class="material-icons">edit</i> แก้ไขบัญชี
                        </a>
                        <!--<a class="dropdown-item" href="student-profile.html">
                            <i class="material-icons">person</i> Public Profile
                        </a> -->
                        <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeLogOut) ?>">
                            <i class="material-icons">lock_open</i> ออกจากระบบ
                        </a>
                    </div>
                </li>
<?php
            }else{
?>
                <li class="nav-item d-none d-md-flex">
                    <a href="<?php Nav::echoURL($dir, App::$pageRegister) ?>" class="nav-link">
                        สมัครสมาชิก
                    </a>
                </li>
                <li class="nav-item d-none d-md-flex ml-md-3">
                    <a href="<?php Nav::echoURL($dir, App::$pageLogin) ?>" class="nav-link">
                        เข้าสู่ระบบ
                    </a>
                </li>
<?php
            }
        }
    }