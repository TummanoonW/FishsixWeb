<?php
    class ViewBranch{
        public static function initView($dir, $paths, $branch){
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

                                        <div class="media mb-headings align-items-center">
                                            <div class="media-body">
                                                <h1 class="h2"><?php echo $branch->title ?></h1>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="<?php Asset::echoThumb($dir, $branch->thumbnail) ?>" target="_blank">
                                                <img src="<?php Asset::echoThumb($dir, $branch->thumbnail) ?>" style="height: 256px; width: 100%; object-fit: cover;">
                                            </a>
                                            <h4 class="mt-4">คำอธิบาย</h4>
                                            <p class="mt-2 text-dark"><?php echo $branch->description ?><p>
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <span class="col-12 col-md-6 text-muted">
                                                        <i class="fas fa-place-of-worship mr-2"></i>
                                                        จุดสังเกตุ: <?php echo $branch->nearbyPlace ?>
                                                    </span>
                                                    <span class="col-12 col-md-6 text-muted">
                                                        <i class="fas fa-map-marker-alt mr-2"></i>
                                                        <?php echo $branch->address ?>
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    
                                                </div>
                                                <div class="media-right">
                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php Sidemenu::initSideMenu($dir) ?>
                            </div>
                        </div>
                    </div>
                    <?php Script::initScript($dir) ?>
                                                        
                    <script id="obj-packages"><?php echo json_encode($packages) ?></script>
                    <script id="obj-urls"><?php echo json_encode($urls) ?></script>
                                                        
                    <?php Script::customScript($dir, 'viewcourse.js') ?>
                                                        
                    <script src="<?php Nav::echoURL($dir, 'assets/js/lightgallery.min.js')?>"></script>
                    <script type="text/javascript">
                        lightGallery(
                            document.getElementById('lightgallery'),
                            {
                                thumbnail:true
                            }); 
                    </script>
            <?php
        }
    }