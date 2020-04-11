<?php
    class VideoLibraryView{
        public static function initView($dir, $sess, $paths, $latest, $categories, $isAllowed){
            $auth = $sess->getAuth();
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
                                        <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                            <!--<div class="flex mb-2 mb-sm-0">
                                                <h1 class="h2">คลังวิดีโอ</h1>
                                            </div> -->
                                        </div>        
                                        <section id="row" class="mt-3">
                                            <h4 class="text-secondary">อัพโหลดล่าสุด</h4>
                                            <div class="row">
                                                <?php $first = $latest[0]; array_shift($latest); ?>
                                                <div class="col-12">            
                                                    <div class="card bg-dark text-white" style="border: 1px solid black;">
                                                      <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $first->ID) ?>">
                                                        <img src="https://i1.ytimg.com/vi/<?php echo $first->youtube_id ?>/mqdefault.jpg" class="card-img" alt="...">
                                                      </a>
                                                      <div class="card-body">
                                                        <h5 class="card-title text-muted"><?php echo $first->title ?></h5>
                                                        <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $first->ID) ?>" class="btn btn-primary"><i class="fas fa-play mr-2"></i>ดูวิดีโอ</a>
                                                      </div>
                                                    </div>
                                                </div>
                                                <?php self::initCard($dir, $latest) ?>
                                            </div>
                                        </section>
                                        <section id="history" class="mt-3">
                                            
                                        </section>
                                        <div>
                                            <?php self::initSection($dir, $categories) ?>
                                        </div>
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
                <?php Script::customScript($dir, 'video-library.js') ?>
            <?php
        }

        private static function initSection($dir, $categories){
            foreach ($categories as $key => $value) {
            ?>
                <div id="row" class="col-12 mt-4 mb-5">
                    <div class="media">
                        <div class="media-body"><h4 class="text-secondary"><?php echo $value->title ?></h4></div>
                        <div class="media-right text-right"><a href="<?php Nav::echoURL($dir, App::$pageVideoPlaylist . "?id=$value->ID") ?>" class="text-primary">ดูทั้งหมด</a></div>
                    </div>
                    <div class="row">
                        <?php self::initCard($dir, $value->videos) ?>
                    </div>
                </div>
            <?php
            }
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