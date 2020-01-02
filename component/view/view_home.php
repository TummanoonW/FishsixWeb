<?php
    class HomeView{
        public static function initView($dir, $sess, $recommended_courses, $all_courses, $forums){
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
                                    <!--<section id="row1" class="mt-1">
                                        <h2 class="sectionTitle">คอร์สแนะนำ</h2>
                                        <div class="examples">
                                           <ul class="img-list">
                                             <?php self::initCard($dir, $recommended_courses) ?>
                                           </ul>
                                        </div>
                                    </section>-->
                                    
                                   <section id="row2" class="mt-4 mb-5">
                                        <h2 class="sectionTitle">คอร์สเรียนทั้งหมด</h2>
                                        <div class="row">
                                            <?php self::initCourses($dir, $all_courses) ?>
                                        </div>
                                   </section>

                                   <section id="row3" class="mb-4">
                                        <h2 class="sectionTitle">ตัวอย่างการสอน</h2>
                                        <div class="row">
                                            <div class="col-md-7 col-12 mb-3">
                                                <iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fweb.facebook.com%2Ffishsix.easy%2Fvideos%2F218265459066332%2F&width=500&show_text=false&appId=325835354749997&height=281" class="w-100" height="281" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media" allowFullScreen="true"></iframe>
                                            </div>
                                            <div class="col-md-5 col-12">
                                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fweb.facebook.com%2Ffishsix.easy%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=325835354749997" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                                            </div>
                                        </div>
                                   </section>

                                   <section id="row4" class="mb-4">
                                        <h2 class="sectionTitle">บทความน่าสนใจ</h2>
                                        <div class="row">
                                            <?php self::initForums($dir, $forums) ?>
                                        </div>
                                        <div class="text-center">
                                            <a href="<?php Nav::echoURL($dir, App::$pageForums) ?>" class="btn btn-primary">แสดงเพิ่มเติม</a>
                                        </div>
                                   </section>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
<?php

        }

        public static function initForums($dir, $forums){
            foreach ($forums as $key => $value) {
                $id = $value->ID;
            ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card">
                        <div class="card-header" style="padding: 0; height: 16vh;">
                            <a href="#" class="mb-3 w-xs-plus-down-100 mr-sm-3">
                                <?php if($value->thumbnail == ''){ ?>
                                        <img src="<?php Asset::echoThumb($dir, $value->thumbnail) ?>" alt="<?php echo $value->title ?>" class="w-100 h-100" style="background: black;">
                                <?php }else{ ?>
                                        <img src="<?php echo $value->thumbnail ?>" alt="<?php echo $value->title ?>" class="w-100 h-100" style="background: black;">
                                <?php } ?>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-column flex-sm-row">   
                                <div class="flex" style="min-width: 200px;">
                                    <h4 class="card-title mb-1 h4-5"><a href="#"><?php echo $value->title ?></a></h4>
                                    <span class="text-black-50"><?php echo $value->content ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }

        public static function initCourses($dir, $courses){
            foreach ($courses as $key => $value) {
            ?>
                <div class="col-md-6 col-12">
                    <div class="image">
                       <a href="<?php Nav::echoURL($dir, App::$pageCourseView ."?id=$value->ID") ?>">
                            <img id="box1" src="<?php Asset::echoThumb($dir, $value->thumbnail)?>" class="w-100 h-auto" />
                            <span class="text-content">
                                <h4 class="text-light">
                                  <?php echo $value->title?>
                                </h4>
                                <i class="far fa-play-circle" style="font-size: 48px"></i>
                                <br><br>
                                <i class="fas fa-chevron-down" onclick="openNav()" aria-hidden="true"></i>
                            </span>
                       </a>
                    </div>
                </div>
            <?php
            }
        }
        
        public static function initCard($dir, $courses){
            foreach ($courses as $key => $c) {
?>
                <li class="image">
                   <a href="<?php Nav::echoURL($dir, App::$pageCourseView ."?id=$c->ID") ?>">
                        <img id="box1" src="<?php Asset::echoThumb($dir, $c->thumbnail)?>" width="280" height="150" />
                        <span class="text-content">
                            <h4 class="text-light">
                              <?php echo $c->title?>
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

        public static function printCategory($id, $cats){
            $title = "Uncategorized";
            foreach ($cats as $key => $value) {
                if($value->ID == $id){
                    $title = $value->title;
                }
            }
            return $title;
        }
    }