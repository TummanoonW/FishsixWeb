<?php
    class VideoView{
        public static function initView($dir, $sess, $paths, $category, $video, $isAllowed){
            ?>
            <body class="layout-fluid" style="background: black;">
                <link rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/theme.css') ?>" type="text/css">
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
                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                <iframe src="https://www.youtube.com/embed/<?php echo $video->youtube_id ?>?autoplay=0&showinfo=0&controls=0" width="100%" height="400" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                            </div>
                                            <div class="col-12 text-muted">
                                                <h3 class="text-light"><?php echo $video->title ?></h3>
                                                <small><?php echo $video->date ?> - views:<?php echo $video->views ?></small>
                                                <p><?php echo $video->content ?></p>
                                            </div>
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
            <?php
        }

        
    }

?>