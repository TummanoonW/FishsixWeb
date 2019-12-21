<?php
    class ViewBranches{
        public static function initView($dir, $sess, $paths, $branchs){
?>
         <body class="layout-fluid">
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
                                    
                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">สาขาของเรา</h1>
                                            <div class="row">
                                    <?php self::initCard($dir, $branchs) ?>
                                </div>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>

               
                 
                        
<?php 
        }
        public static function initCard($dir, $branchs){
            foreach ($branchs as $key => $branch) {
                $id = $branch->ID;
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-20">
                        <div class="card">
                        <div class="card-header" style="padding: 0; height: 20vh;">
                                <a href="<?php Nav::echoURL($dir, App::$pageViewBranch . "?id=$id") ?>" class="mb-3 w-xs-plus-down-100 mr-sm-3">
                                    <?php if($branch->thumbnail == ''){ ?>
                                            <img src="<?php Asset::echoThumb($dir, $branch->thumbnail) ?>" alt="<?php echo $branch->title ?>" class="w-100 h-100" style="background: black;">
                                    <?php }else{ ?>
                                            <img src="<?php echo $branch->thumbnail ?>" alt="<?php echo $branch->title ?>" class="w-100 h-100" style="background: black;">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column flex-sm-row">   
                                    <div class="flex" style="min-width: 200px;">
                                        <h4 class="card-title mb-1 h4-5"><a href="<?php Nav::echoURL($dir, App::$pageViewBranch . "?id=$id") ?>"><?php echo $branch->title ?></a></h4>
                                        <span class="text-black-50"><?php echo $branch->description ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                 <a href="<?php Nav::echoURL($dir, App::$pageCourses . "?id=$id") ?>" class="btn btn-white btn-sm float-left">  ดูคอร์สที่เปิดสอน  </a>            
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }
    ?>