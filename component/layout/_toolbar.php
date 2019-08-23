<?php
    class Toolbar{ ////common toolbar HTML elements loader
        public static function initToolbar($dir){  
            $auth = Session::getAuth();
?>
            <!-- Header -->
            <div id="header" data-fixed class="mdk-header js-mdk-header mb-0">
                <div class="mdk-header__content">
                    <!-- Navbar -->
                    <nav id="default-navbar" class="navbar navbar-expand navbar-dark bg-primary m-0">
                        <div class="container-fluid">
                            <!-- Toggle sidebar -->
                            <button id="btn-menu" class="navbar-toggler d-block" data-toggle="sidebar" type="button">
                                <span class="material-icons">menu</span>
                            </button>
                            <!-- Brand -->
                            <a href="<?php Nav::echoHome($dir) ?>" class="navbar-brand">
                                <img src="<?php Asset::embedIcon($dir, Asset::$iconURL2) ?>" class="mr-2" alt="<?php echo App::$name ?>" />
                                <span class="d-none d-xs-md-block"><?php echo App::$name ?></span>
                            </a>
                            <!-- Search -->
                            <form class="search-form d-none d-md-flex">
                                <input type="text" class="form-control" placeholder="คำค้นหา">
                                <button class="btn" type="button"><i class="material-icons font-size-24pt">search</i></button>
                            </form>
                            <!-- // END Search -->
                            <div class="flex"></div>
                            <!-- Menu -->
                            <ul class="nav navbar-nav flex-nowrap d-none d-lg-flex">
                                <li class="nav-item">
                                    <a class="nav-link" href="student-forum.html">บทความ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="student-help-center.html">ขอความช่วยเหลือ</a>
                                </li>
                            </ul>
                            <!-- Menu -->
                            <?php Menu::initMenu($dir) ?>
                            <!-- // END Menu -->
                        </div>
                    </nav>
                    <!-- // END Navbar -->
                </div>
            </div>
<?php   
        }                                              
    }
?>