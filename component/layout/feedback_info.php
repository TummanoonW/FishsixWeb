<?php
    class InfoPage{
        public static function initPage($dir, $msg){
            $sess = new Sess();
            Header::initHeader($dir, App::$name . " - Info"); //initialize HTML header elements with '<<someone name>> 's Profile' as Title

?>
            <body class=" layout-fluid">
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir, '', $sess); ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">
                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">
                                <div class="jumbotron bg-light mt-4">
                                  <h1 class="display-4"><i class="fas fa-info-circle"></i>&nbsp; Info</h1>
                                  <p class="lead"><?php echo $msg ?></p>
                                  <hr class="my-4">
                                  <a class="btn btn-outline-secondary btn-lg" href="<?php Nav::echoPrevious(); ?>" role="button"><i class="fas fa-arrow-left mr-2"></i> ย้อนกลับ</a>
                                  <a class="btn btn-primary btn-lg" href="<?php Nav::echoHome($dir); ?>" role="button"><i class="fas fa-home"></i> ไปหน้าหลัก</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
<?php
            Script::initScript($dir); 
            Footer::initFooter($dir); //initialize HTML footer elements
        }
    }