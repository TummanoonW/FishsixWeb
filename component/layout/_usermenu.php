<?php
    class UserMenu{
        public static function initUserMenu($dir){
            $auth = Session::getAuth();

            if(Session::checkUserExisted()){
?>
                <li class="nav-item dropdown ml-1 ml-md-3">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"><img src="<?php Nav::printURL($dir, './assets/images/people/50/guy-6.jpg') ?>" alt="Avatar" class="rounded-circle" width="40"></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php if(Session::checkUserAdmin()){ ?>
                            <a class="dropdown-item" href="<?php Nav::printURL($dir, App::$pageAdminPanel) ?>">
                                <i class="material-icons">apps</i> Admin Panel
                            </a>
                        <?php } ?>
                        <a class="dropdown-item" href="<?php Nav::printURL($dir, App::$pageMyCourses) ?>">
                            <i class="material-icons">school</i> My Courses
                        </a>
                        <a class="dropdown-item" href="<?php Nav::printURL($dir, App::$pageProfile) ?>">
                            <i class="material-icons">edit</i> Edit Account
                        </a>
                        <!--<a class="dropdown-item" href="student-profile.html">
                            <i class="material-icons">person</i> Public Profile
                        </a> -->
                        <a class="dropdown-item" href="<?php Nav::printURL($dir, App::$routeLogOut) ?>">
                            <i class="material-icons">lock_open</i> Log Out
                        </a>
                    </div>
                </li>
<?php
            }else{
?>
                <li class="nav-item d-none d-md-flex">
                    <a href="<?php Nav::printURL($dir, App::$pageRegister) ?>" class="nav-link">
                        Register
                    </a>
                </li>
                <li class="nav-item d-none d-md-flex ml-md-3">
                    <a href="<?php Nav::printURL($dir, App::$pageLogin) ?>" class="nav-link">
                        Log In
                    </a>
                </li>
<?php
            }
        }
    }