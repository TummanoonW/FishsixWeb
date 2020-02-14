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
                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">
                                <div class="container-fluid page__container"> 
                                                        <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                                    <?php if($isAllowed){ ?>                               
                                        <section id="row1" class="mt-1">
                                            <h2 class="sectionTitle text-secondary">เพลย์ลิสต์ของ - <?php echo $category->title ?></h2>
                                            <div class="row">
                                                <?php self::initCard($dir, $videos) ?>
                                            </div>
                                        </section>
                                    <?php }else{
                                        Alert::initAlert($dir, "คุณต้องซื้อคอร์สใดคอร์สหนึ่งของเราก่อนจะใช้งานฟีเจอร์นี้ได้");
                                    } ?>
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
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
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card bg-dark text-white" style="border: 1px solid black;">
                            <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>">
                                <img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" class="card-img" alt="...">
                            </a>
                          <div class="card-body">
                            <h5 class="card-title text-muted"><?php echo $value->title ?></h5>
                            <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>" class="btn btn-primary"><i class="fas fa-play mr-2"></i>ดูวิดีโอ</a>

                            <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                          </div>
                        </div>
                    </div>
                <?php
            }
        }
    }

?>