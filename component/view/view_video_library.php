<?php
    class VideoLibraryView{
        public static function initView($dir, $sess, $paths, $latest, $categories, $isAllowed){
            $auth = $sess->getAuth();
            ?>
            <body class=" layout-fluid">
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
                                            <div class="flex mb-2 mb-sm-0">
                                                <h1 class="h2">คลังวิดีโอ</h1>
                                            </div> 
                                            <?php if($sess->checkUserAdmin()){ ?>
                                                <a href="<?php Nav::echoURL($dir, App::$pageAdminVideoEditor) ?>" class="btn btn-success">+ เพิ่มวิดีโอ</a>
                                            <?php } ?>
                                        </div>                    
                                        <section id="row1" class="mt-1">
                                            <h2 class="sectionTitle">อัพโหลดล่าสุด</h2>
                                            <div class="examples">
                                               <ul class="img-list">
                                                 <?php self::initCard($dir, $latest) ?>
                                               </ul>
                                            </div>
                                        </section>
                                        <?php self::initSection($dir, $categories) ?>
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
            <?php
        }

        private static function initSection($dir, $categories){
            foreach ($categories as $key => $value) {
            ?>
                <section id="row2" class="mt-4 mb-5">
                    <div class="media">
                        <div class="media-body"><h2 class="sectionTitle"><?php echo $value->title ?></h2></div>
                        </div class="media-right text-right"><a href="<?php Nav::echoURL($dir, App::$pageVideoPlaylist . "?id=$value->ID") ?>">ดูทั้งหมด</a></div>
                    </div>
                    <div class="examples">
                        <ul class="img-list">
                            <?php self::initCard($dir, $value->videos) ?>
                        </ul>
                    </div>
                </section>
            <?php
            }
        }

        private static function initCard($dir, $videos){
            foreach ($videos as $key => $value) {
                ?>
                    <li class="image">
                       <a href="https://www.youtube.com/watch?v=<?php echo $value->youtube_id ?>">
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