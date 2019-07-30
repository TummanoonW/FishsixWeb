<?php
    class Sidemenu{ //sidemenu HTML elements loader

        public static function initAppSettingsFAB($dir){
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

        public static function initSideMenu($dir){
?>
            <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                <div class="mdk-drawer__content ">
                    <div class="sidebar sidebar-left sidebar-dark bg-dark o-hidden" data-perfect-scrollbar>
                        <div class="sidebar-p-y">

                            <?php if(Session::checkUserExisted()){ ?>
                                <div class="sidebar-heading">APPLICATIONS</div>
                                <ul class="sidebar-menu sm-active-button-bg">
                                    <?php if(Session::checkUserAdmin()){ ?>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageAdminPanel); ?>">
                                                <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">apps</i> Admin Panel
                                            </a>
                                        </li>
                                    <?php } ?>

                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageMyCourses); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> My Courses
                                        </a>
                                    </li>      
                                </ul>
                            <?php } ?>

                            <!-- Explore Menu -->
                            <div class="sidebar-heading">Explore</div>
                            <ul class="sidebar-menu sm-active-button-bg">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php Nav::echoURL("", $dir); ?>">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">search</i> Browse Courses
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir,'viewcourse.php')?> ">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">import_contacts</i> View Course
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="student-take-course.html">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">class</i> Take Course
                                        <span class="sidebar-menu-badge badge badge-primary ml-auto">PRO</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="student-take-quiz.html">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i> Take a Quiz
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="student-quiz-results.html">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">poll</i> Quiz Results
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir,'mycourses.php');?> ">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">school</i> My Courses
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" data-toggle="collapse" href="#forum_menu">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">chat_bubble_outline</i>
                                        Community
                                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                    </a>
                                    <ul class="sidebar-submenu sm-indent collapse" id="forum_menu">
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="">
                                                <span class="sidebar-menu-text">Forum</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="">
                                                <span class="sidebar-menu-text">Discussion</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="">
                                                <span class="sidebar-menu-text">Ask Question</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="">
                                                <span class="sidebar-menu-text">Student Profile - Courses</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="">
                                                <span class="sidebar-menu-text">Student Profile - Posts</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-menu-item">
                                            <a class="sidebar-menu-button" href="instructor-profile.html">
                                                <span class="sidebar-menu-text">Instructor Profile</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- Account menu -->
                            <div class="sidebar-heading">Account</div>
                            <ul class="sidebar-menu">
                                <?php if(Session::checkUserExisted()){ ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageProfile); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">edit</i> Edit Account
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$routeLogOut); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock_open</i> Log Out
                                        </a>
                                    </li>
                                <?php }else{ ?>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageLogin); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">lock</i> Log In
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button" href="<?php Nav::echoURL($dir, App::$pageRegister); ?>">
                                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment_ind</i> Register
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>

                            <!-- Help menu -->
                            <div class="sidebar-heading">Helps</div>
                            <ul class="sidebar-menu">
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button" href="student-help-center.html">
                                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">live_help</i> Get Help
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