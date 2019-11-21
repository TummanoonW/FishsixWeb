<?php
    class ViewTerm{
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
                                            <h1 class="h2">ข้อตกลงและเงื่อนไข</h1>
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