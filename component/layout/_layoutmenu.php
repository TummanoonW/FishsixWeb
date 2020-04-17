<?php
    class LayoutMenu{
        public static function initLayoutMenu($dir, $sess){
            $auth = $sess->getAuth();
            $countC = 0;
            $s_carts = (array)$sess->get('mycart');
            $countC = $countC + count($s_carts);
?>
        <?php if($auth != NULL){ ?>
                    <style>
                        [dir=ltr] .dropdown-menu2{
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            top: initial;
                            z-index: 1000;
                            display: none;
                            float: left;
                            min-width: 10rem;
                            padding: .5rem 0;
                            margin: .5rem 0 0;
                            font-size: .9375rem;
                            color: #383b3d;
                            text-align: left;
                            list-style: none;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #f0f1f2;
                            border-radius: .1875rem;
                            box-shadow: 0 5px 11px 0 rgba(56,59,61,.07);
                        }    
                    </style>
                    <div class="navbar w-100 row">
                        <!--<div class="col-3 text-center">
                            <a href="<?php Nav::echoHome($dir); ?>"><i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">home</i></a>
                        </div>-->
                        <div class="col-auto text-center">
                            <a href="<?php Nav::echoURL($dir, App::$pageMyCourses); ?>"><i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i></a>
                        </div>
                        <div class="col-auto text-center">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i></a>
                                    <div class="dropdown-menu dropdown-menu2">
                                        <?php if($auth->type == 'admin'){ ?>
                                            
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageAdminPanel); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i> ระบบจัดการ
                                            </a>

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageAnalytics); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">bar_chart</i> Analytics
                                            </a>

                                        <?php } 
                                            else if($auth->type == 'editor'){
                                        ?>
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageAdminPanel); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i> ระบบจัดการ
                                            </a>
                                        <?php
                                            }
                                            else if($auth->type == 'teacher'){ 
                                        ?>
                                        
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageTeacherPanel); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> ระบบการสอน
                                            </a>

                                        <?php
                                            }
                                        ?>

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageMyCourses); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> คอร์สของฉัน
                                            </a> 

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageMyOrders); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">all_inbox</i> คำสั่งซื้อของฉัน
                                            </a>

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageMySchedule); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">schedule</i> ตารางเรียน
                                            </a>
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageForums) ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">forum</i> บทความ
                                            </a>
                                    </div>
                        </div>
                        <?php if($auth->type == 'admin' || $auth->type == 'editor' || $auth->type == 'teacher' || $auth->unlockVidLib){ ?>
                            <div class="col-auto text-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageVideoLibrary); ?>"><i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">playlist_play</i></a>
                            </div>
                            <div class="col-auto text-center">
                                <a href="https://anyflip.com/bookcase/stdor" target="_blank"><i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">book</i></a>
                            </div>
                        <?php } ?>
                        <div class="col-auto text-center">
                            <a href="<?php Nav::echoURL($dir, App::$pageMyCart) ?>">
                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">shopping_cart</i>
                                <?php if($countC > 0){ ?>
                                    <span class="badge badge-notifications badge-danger"><?php echo $countC  ?></span>
                                <?php } ?>
                            </a>
                        </div>
                    </div>
        <?php } ?>
<?php
        }

        public static function initLayoutMenuSKRN($dir, $sess){
            $auth = $sess->getAuth();
            $countC = 0;
            $s_carts = (array)$sess->get('mycart');
            $countC = $countC + count($s_carts);
?>
        <?php if($auth != NULL){ ?>
                    <style>
                        .dropdown-menu2{
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            top: initial;
                            z-index: 1000;
                            display: none;
                            float: left;
                            min-width: 10rem;
                            padding: .5rem 0;
                            margin: .5rem 0 0;
                            font-size: .9375rem;
                            color: #383b3d;
                            text-align: left;
                            list-style: none;
                            background-color: #fff;
                            background-clip: padding-box;
                            border: 1px solid #f0f1f2;
                            border-radius: .1875rem;
                            box-shadow: 0 5px 11px 0 rgba(56,59,61,.07);
                        }    
                    </style>
                    <div class="navbar w-100 row" style="height: 48px;">
                        <!--<div class="col-3 text-center">
                            <a href="<?php Nav::echoHome($dir); ?>"><i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">home</i></a>
                        </div>-->
                        <div class="col-auto text-center">
                            <a href="<?php Nav::echoURL($dir, App::$pageMyCourses); ?>"><i class="fas fa-graduation-cap"></i></a>
                        </div>
                        <div class="col-auto text-center">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></a>
                                    <div class="dropdown-menu dropdown-menu2">
                                        <?php if($auth->type == 'admin'){ ?>
                                            
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageAdminPanel); ?>">
                                                <i class="fas fa-bars"></i> ระบบจัดการ
                                            </a>

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageAnalytics); ?>">
                                            <i class="far fa-chart-bar"></i> Analytics
                                            </a>

                                        <?php } 
                                            else if($auth->type == 'editor'){
                                        ?>
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageAdminPanel); ?>">
                                                <i class="fas fa-bars"></i> ระบบจัดการ
                                            </a>
                                        <?php
                                            }
                                            else if($auth->type == 'teacher'){ 
                                        ?>
                                        
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageTeacherPanel); ?>">
                                                <i class="fas fa-chalkboard-teacher"></i> ระบบการสอน
                                            </a>

                                        <?php
                                            }
                                        ?>

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageMyCourses); ?>">
                                                <i class="fas fa-graduation-cap"></i> คอร์สของฉัน
                                            </a> 

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageMyOrders); ?>">
                                                <i class="fas fa-inbox"></i> คำสั่งซื้อของฉัน
                                            </a>

                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageMySchedule); ?>">
                                                <i class="far fa-clock"></i> ตารางเรียน
                                            </a>
                                            <a class="dropdown-item py-2" href="<?php Nav::echoURL($dir, App::$pageForums) ?>">
                                                <i class="fab fa-wpforms"></i> บทความ
                                            </a>
                                    </div>
                        </div>
                        <?php if($auth->type == 'admin' || $auth->type == 'editor' || $auth->type == 'teacher' || $auth->unlockVidLib){ ?>
                            <div class="col-auto text-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageVideoLibrary); ?>"><i class="fab fa-youtube"></i></a>
                            </div>
                            <div class="col-auto text-center">
                                <a href="https://anyflip.com/bookcase/stdor" target="_blank"><i class="fas fa-book"></i></a>
                            </div>
                        <?php } ?>
                        <div class="col-auto text-center">
                            <a href="<?php Nav::echoURL($dir, App::$pageMyCart) ?>">
                                <i class="fas fa-shopping-cart"></i>
                                <?php if($countC > 0){ ?>
                                    <span class="badge badge-notifications badge-danger"><?php echo $countC  ?></span>
                                <?php } ?>
                            </a>
                        </div>
                    </div>
        <?php } ?>
<?php
        }
    }