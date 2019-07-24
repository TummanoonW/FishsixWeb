<?php
    class Menu{
        public static function initMenu($dir){
?>
            <ul class="nav navbar-nav flex-nowrap">
                <?php 
                    if(Session::checkUserExisted()){ 
                ?>
                        <li class="nav-item d-none d-md-flex">
                            <a href="mycart.php" class="nav-link">
                                <i class="material-icons">shopping_cart</i>
                            </a>
                        </li>
                <?php 
                    }
                    Notification::initNotification($dir);
                ?>
                <!-- // END Notifications dropdown -->
                <!-- User dropdown -->
                <?php UserMenu::initUserMenu($dir); ?>
                <!-- // END User dropdown -->
            </ul>
<?php
        }
    }