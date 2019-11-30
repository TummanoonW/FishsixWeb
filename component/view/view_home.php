<?php
    class HomeView{
        public static function initView($dir, $pages, $courses, $categories){
            $auth = Session::getAuth();
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

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout" style="background: #0F0F0F">
                            <div class="mdk-drawer-layout__content page ">
                                <div class="container-fluid page__container">                                
                                    <section id="row1" class="mt-1">
                                        <h2 class="sectionTitle text-light">คอร์สแนะนำ</h2>
                                        <div class="examples">
                                           <ul class="img-list">
                                             <?php self::initCard($dir, $courses, $categories) ?>
                                           </ul>
                                        </div>
                                    </section>
                                    
                                   <section id="row2" class="mt-4 mb-5">
                                    <h2 class="sectionTitle text-light">คอร์เรียนทั้งหมด</h2>
                                    <div class="examples">
                                       <ul class="img-list">
                                          <li class="image">
                                             <a href="#">
                                                <img src="http://placehold.it/280x150" width="280" height="150" />
                                                <span class="text-content"><span>Title Here...<br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br><i class="fa fa-chevron-down" aria-hidden="true"></i></span></span>
                                             </a>
                                          </li>
                                          <li class="image">
                                             <a href="#">
                                                <img src="http://placehold.it/280x150" width="280" height="150" />
                                                <span class="text-content"><span>Title Here...<br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br><i class="fa fa-chevron-down" aria-hidden="true"></i></span></span>
                                             </a>
                                          </li>
                                          <li class="image">
                                             <a href="#">
                                                <img src="http://placehold.it/280x150" width="280" height="150" />
                                                <span class="text-content"><span>Title Here...<br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br><i class="fa fa-chevron-down" aria-hidden="true"></i></span></span>
                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                   </section>

                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
<?php

        }
        
        public static function initCard($dir, $courses, $categories){
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