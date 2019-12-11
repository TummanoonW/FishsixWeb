<?php
    class Menu{
        public static function initMenu($dir){
            $countC = 0;
            $s_carts = (array)SESSION::get('mycart');
            $countC = $countC + count($s_carts);

            if(SESSION::checkUserExisted()){
                Includer::include_fun($dir, 'fun_mycart.php');
                $auth = SESSION::getAuth();
                $apiKey = SESSION::getAPIKey(); 
                $api = new API($apiKey);

                /*$result = FunMyCart::countByAuthID($api, $auth->ID);
                $carts = (int)$result->response;
                $countC = $countC + $carts;*/
            }
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
                <?php Notification::initNotification($dir) ?>
                <!-- // END Notifications dropdown -->

                <!-- User dropdown -->
                <?php UserMenu::initUserMenu($dir) ?>
                <!-- // END User dropdown -->
            </ul>
<?php
        }
    }