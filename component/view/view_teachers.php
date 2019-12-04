<?php
    class ViewTeachers{
        public static function initView($dir, $paths, $teachers){
?>
         <body class="layout-fluid">
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
                                            <h1 class="h2">ผู้สอน</h1>
                                            <div class="row">
                                                <?php self::initCard($dir, $teachers) ?>
                                            </div>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>
                                     
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>             
<?php 
        }
        public static function initCard($dir, $teachers){
            foreach ($teachers as $key => $teacher) {
                $id = $teacher->ID;
                ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-20">
                        <div class="card">
                        <div class="card-header" style="padding: 0; height: 20vh;">
                                <a href="<?php Nav::echoURL($dir, App::$pageViewTeacher . "?id=$id") ?>" class="mb-3 w-xs-plus-down-100 mr-sm-3">
                                    <?php if($teacher->profile_pic == ''){ ?>
                                            <img src="<?php Asset::echoThumb($dir, $teacher->profile_pic) ?>" alt="<?php echo $teacher->username ?>" class="w-100 h-100" style="background: black;">
                                    <?php }else{ ?>
                                            <img src="<?php echo $teacher->profile_pic ?>" alt="<?php echo $teacher->username ?>" class="w-100 h-100" style="background: black;">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column flex-sm-row">   
                                    <div class="flex" style="min-width: 200px;">
                                        <h4 class="card-title mb-1 h4-5"><a href="<?php Nav::echoURL($dir, App::$pageViewTeacher . "?id=$id") ?>">ครู <?php echo $teacher->username ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                 <a href="<?php Nav::echoURL($dir, App::$pageViewTeacher . "?id=$id") ?>" class="btn btn-white btn-sm float-left">  ดูโปรไฟล์  </a>            
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }
    ?>