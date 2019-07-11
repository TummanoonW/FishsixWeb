<?php
    class Menu{
        public static function initMenu(){
?>
            <ul class="nav navbar-nav flex-nowrap">
                <?php 
                    if(Session::checkUserExisted()){ 
                ?>
                        <li class="nav-item d-none d-md-flex">
                            <a href="student-cart.html" class="nav-link">
                                <i class="material-icons">shopping_cart</i>
                            </a>
                        </li>
                <?php 
                    }
                    Notification::initNotification();
                ?>
                <!-- // END Notifications dropdown -->
                <!-- User dropdown -->
                <?php UserMenu::initUserMenu(); ?>
                <!-- // END User dropdown -->
            </ul>
<?php
        }
    }