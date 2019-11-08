<?php
    class ViewBooking{
        public static function initView($dir, $paths, $booking){
            $fname = $booking->owner->user->fname;
            $lname = $booking->owner->user->lname;
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
                                                <h1 class="h2">การจอง #<?echo $booking->ID ?></h1>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="<? Asset::echoIcon($dir, $booking->owner->profile_pic) ?>" class="icon-block avatar">
                                            <h4 class="mt-4">ผู้จอง: คุณ <? echo $fname . " " . $lname ?></h4>
                                            <h4 class="mt-4">คอร์ส: <? echo $booking->course->title ?></h4>
                                            <h4 class="mt-4">เรียนที่สาขา: <? echo $booking->courseBranch->branch->title ?></h4>
                                            <div class="media align-items-center">
                                                <div class="media-left">
                                                    <span class="col-12 col-md-6 text-muted">
                                                        <i class="fas fa-book-open mr-2"></i>
                                                        วันที่จอง: <? echo $booking->date ?>
                                                    </span>
                                                    <span class="col-12 col-md-6 text-muted">
                                                    <i class="fas fa-user-graduate mr-2"></i>
                                                        วันที่เรียน: <? echo $booking->startDate ?>
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