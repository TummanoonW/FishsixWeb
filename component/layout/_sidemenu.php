<?php
    class Sidemenu{ //sidemenu HTML elements loader

        public static function initAppSettingsFAB($dir, $sess){
?>
            <div id="app-settings">
                <app-settings layout-active="default" :layout-location="{
                    'fixed': 'fixed-student-account-edit.html',
                    'default': 'student-account-edit.html'
                    }" sidebar-variant="bg-transparent border-0">
                </app-settings>
            </div>
<?php
        } 

        public static function initSideMenu($dir, $sess){
?>
            <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                <div class="mdk-drawer__content ">
                    <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                        <div class="sidebar-p-y">

                            <?php if($sess->checkUserExisted()){ ?>
                                <div class="sidebar-heading">เมนูของฉัน</div>
                                <ul class="sidebar-menu sm-active-button-bg">
                                    <?php if($sess->checkUserAdmin()){ ?>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageAdminPanel); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i> ระบบจัดการ
                                            </a>
                                        </li>
                                    <?php } 
                                        if($sess->checkUserTeacher()){ 
                                    ?>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageTeacherPanel); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> ระบบการสอน
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageMyCourses); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> คอร์สของฉัน
                                        </a>
                                    </li>  

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageMyOrders); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">all_inbox</i> คำสั่งซื้อของฉัน
                                        </a>
                                    </li> 

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageMySchedule); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">schedule</i> ตารางเรียน
                                        </a>
                                    </li> 
                                </ul>
                            <?php } ?>

                            <!-- Explore Menu -->
                            <div class="sidebar-heading">เมนูค้นหา</div>
                            <ul class="sidebar-menu sm-active-button-bg">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php Nav::echoHome($dir); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">home</i> หน้าร้านค้า
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageCourses); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> ค้นหา
                                    </a>
                                </li>
                            </ul>

                            <!-- Account menu -->
                            <div class="sidebar-heading">บัญชี</div>
                            <ul class="sidebar-menu">
                                <?php if($sess->checkUserExisted()){ ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageProfile); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">edit</i> แก้ไขบัญชี
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$routeLogOut); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> ออกจากระบบ
                                        </a>
                                    </li>
                                <?php }else{ ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageLogin); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock</i> เข้าสู่ระบบ
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageRegister); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment_ind</i> สมัครสมาชิก
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>

                            <!-- Help menu -->
                            <div class="sidebar-heading">อื่นๆ</div>
                            <ul class="sidebar-menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageForums) ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">forum</i> บทความ
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageHelpCenter) ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> ขอความช่วยเหลือ
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            
<?php
        }
    }