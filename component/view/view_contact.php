<?php
    class ViewContact{
        public static function initView($dir, $sess, $paths, $branches){
            ?>
                <body class="layout-fluid">
                    <link type="text/css" rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/lightgallery.min.css') ?>" /> 
                    <!-- Pre Loader -->
                    <?php Preloader::initPreloader($dir) ?>

                    <!-- Header Layout -->
                    <div class="mdk-header-layout js-mdk-header-layout">

                        <!-- Header -->
                        <?php Toolbar::initToolbar($dir, '', $sess) ?>
                        <!-- // END Header -->

                        <!-- Header Layout Content -->
                        <div class="mdk-header-layout__content" style="padding-top: 64px">
                      
                            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                                <div class="mdk-drawer-layout__content page ">
                                    <div class="container-fluid page__container">

                                            <!-- Navigation Paths -->
                                            <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                                            <div class="media-body">
                                                <h1 class="h2">ติดต่อเรา</h1>
                                                
                                                <div class="mt-4 mb-3 row">
                                                    <div class="col-md-4">
                                                        <p>
                                                            <img class="w-100 h-auto" src="<?php Asset::embedThumb($dir, 'about_thumb.jpg') ?>">
                                                        </p>
                                                        <p>
                                                            <a href="https://www.facebook.com/fishsix.easy/"><img width="64" height="64" class="p-2" src="<?php Asset::embedIcon($dir, 'facebook.png') ?>"></a>
                                                            <a href="https://line.me/R/ti/p/%40fishsix"><img width="64" height="64" class="p-2" src="<?php Asset::embedIcon($dir, 'line.png') ?>"></a>
                                                            <a href="https://www.youtube.com/channel/UCifESdqtfGheuv6fvNdhsUw?view_as=subscriber"><img width="64" height="64" class="p-2" src="<?php Asset::embedIcon($dir, 'youtube.png') ?>"></a>
                                                            <a href="https://www.instagram.com/fishsix_/?hl=th"><img width="64" height="64" class="p-2" src="<?php Asset::embedIcon($dir, 'instagram.png') ?>"></a>
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="accordion" id="accordionExample">
                                                            <?php self::initCards($dir, $branches) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                    </div>
                   
                    <?php Script::initScript($dir) ?>
                                                        
            
                                                        
                    
            <?php
        }

        public static function initCards($dir, $branches){
            foreach ($branches as $key => $item) {
            ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $key ?>">
                      <h2 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $key ?>" aria-expanded="true" aria-controls="collapse<?php echo $key ?>">
                          <?php echo $item->title ?>
                        </button>
                      </h2>
                    </div>
                    <div id="collapse<?php echo $key ?>" class="collapse" aria-labelledby="heading<?php echo $key ?>" data-parent="#accordionExample">
                      <div class="card-body">
                        <p><img class="alignnone wp-image-940" src="<?php echo $item->map ?>" alt="" width="450" height="318"></p>
                        <h1>ช่องทางติดต่อ</h1>
                        <p>โทรศัพท์:&nbsp;<a href="tel:0989748688">098 974 8688</a></p>
                        <p>Facebook:&nbsp;<a href="https://www.facebook.com/fishsix.easy/">FISHSIX&nbsp;</a></p>
                        <p>ไลน์:&nbsp;<a href="line://ti/p/@owy6442w">คลิ๊ก</a></p>
                        <p>เว็บไซต์&nbsp;<a href="https://fishsix.in.th/">fishsix.in.th</a></p>
                      </div>
                    </div>
                </div>
            <?php
            }
        }
    }