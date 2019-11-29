<?php
    class ViewContact{
        public static function initView($dir, $paths){
            ?>
                <body class="layout-fluid">
                    <link type="text/css" rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/lightgallery.min.css') ?>" /> 
                    <!-- Pre Loader -->
                    <?php Preloader::initPreloader($dir) ?>

                    <!-- Header Layout -->
                    <div class="mdk-header-layout js-mdk-header-layout">

                        <!-- Header -->
                        <?php Toolbar::initToolbar($dir, '') ?>
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
                                            <div id="elementor-tab-content-1742" class="elementor-tab-content elementor-clearfix" data-tab="2" role="tabpanel" aria-labelledby="elementor-tab-title-1742"><p><img class="alignnone wp-image-942" src="https://fishsix.in.th/wp-content/uploads/2019/06/mapsiam-300x212.png" alt="" width="450" height="318" srcset="https://fishsix.in.th/wp-content/uploads/2019/06/mapsiam-300x212.png 300w, https://fishsix.in.th/wp-content/uploads/2019/06/mapsiam-768x543.png 768w, https://fishsix.in.th/wp-content/uploads/2019/06/mapsiam-1024x724.png 1024w, https://fishsix.in.th/wp-content/uploads/2019/06/mapsiam.png 1188w" sizes="(max-width: 450px) 100vw, 450px" /></p><h1>ช่องทางติดต่อ</h1><p>โทรศัพท์: <a href="tel:0989748688">098 974 8688</a></p><p>Facebook: <a href="https://www.facebook.com/fishsix.easy/">FISHSIX </a></p><p>ไลน์: <a href="line://ti/p/@owy6442w">คลิ๊ก</a></p><p>เว็บไซต์ <a href="https://fishsix.in.th/">fishsix.in.th</a></p></div>
                                            </div>
                                         </div>
                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <?php Sidemenu::initSideMenu($dir) ?>
                            </div>
                   
                    <?php Script::initScript($dir) ?>
                                                        
            
                                                        
                    
            <?php
        }
    }