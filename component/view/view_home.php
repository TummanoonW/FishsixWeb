<?php
    class HomeView{
        public static function initView($dir, $recommended_courses, $all_courses){
            $auth = SESSION::getAuth();
?>
            <body class=" layout-fluid">

                <link rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/theme.css') ?>" type="text/css" />
                <script type="text/javascript" src="<?php Nav::echoURL($dir, 'assets/js/frontpage.js') ?>"></script>

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '') ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">
                                <div class="container-fluid page__container">                                
                                    <section id="row1" class="mt-1">
                                        <h2 class="sectionTitle">คอร์สแนะนำ</h2>
                                        <div class="examples">
                                           <ul class="img-list">
                                             <?php self::initCard($dir, $recommended_courses) ?>
                                           </ul>
                                        </div>
                                    </section>
                                    
                                   <section id="row2" class="mt-4 mb-5">
                                    <h2 class="sectionTitle">คอร์เรียนทั้งหมด</h2>
                                    <div class="examples">
                                       <ul class="img-list">
                                         <?php self::initCard($dir, $all_courses) ?>
                                       </ul>
                                    </div>
                                   </section>

                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
<?php

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