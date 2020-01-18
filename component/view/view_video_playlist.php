<?php
    class VideoPlaylistView{
        public static function initView($dir, $sess, $paths, $category, $videos, $isAllowed){
            ?>
            <body class="layout-fluid" style="background: black;">
                <link rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/theme.css') ?>" type="text/css" />
                <script type="text/javascript" src="<?php Nav::echoURL($dir, 'assets/js/frontpage.js') ?>"></script>

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '', $sess) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">
                        <!-- Navigation Paths -->
                        <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">
                                <div class="container-fluid page__container"> 
                                    <?php if($isAllowed){ ?>                               
                                        <section id="row1" class="mt-1">
                                            <h2 class="sectionTitle text-secondary">เพลย์ลิสต์ของ - <?php echo $category->title ?></h2>
                                            <div class="examples">
                                               <ul class="img-list">
                                                 <?php self::initCard($dir, $videos) ?>
                                               </ul>
                                            </div>
                                        </section>
                                    <?php }else{
                                        Alert::initAlert($dir, "คุณต้องซื้อคอร์สใดคอร์สหนึ่งของเราก่อนจะใช้งานฟีเจอร์นี้ได้");
                                    } ?>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                <?php Script::customScript($dir, 'common.js') ?>
            <?php
        }

        private static function initCard($dir, $videos){
            foreach ($videos as $key => $value) {
                ?>
                    <li class="image">
                        <a href="#" onclick="youtube('https://www.youtube.com/watch?v=<?php echo $value->youtube_id ?>)'">
                            <img id="box1" src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" width="280" height="150" />
                            <span class="text-content">
                                <h4 class="text-light">
                                  <?php echo $value->title?>
                                </h4>
                                <i class="far fa-play-circle" style="font-size: 48px"></i>
                                <br><br>
                                <i class="fas fa-chevron-down" onclick="openNav()" aria-hidden="true"></i>
                            </span>
                       </a>
                    </li>
                <?php
            }
        }
    }

?>