<?php
    class Menu{
        public static function initMenu($dir, $sess){
            $sess = new Sess();
            $countC = 0;
            $s_carts = (array)$sess->get('mycart');
            $countC = $countC + count($s_carts);
?>
            <ul class="nav navbar-nav flex-nowrap">
                <li class="nav-item d-none d-md-flex dropdown-notifications dropdown-menu-sm-full">
                    <a href="<?php Nav::echoURL($dir, App::$pageMyCart) ?>" class="nav-link">
                        <i class="material-icons">shopping_cart</i>
                        <?php if($countC > 0){ ?>
                            <span class="badge badge-notifications badge-danger"><?php echo $countC  ?></span>
                        <?php } ?>
                    </a>
                </li>

                <!-- Notification dropdown -->
                <?php Notification::initNotification($dir, $sess) ?>
                <!-- // END Notifications dropdown -->

                <!-- User dropdown -->
                <?php UserMenu::initUserMenu($dir, $sess) ?>
                <!-- // END User dropdown -->
            </ul>
<?php
        }
    }