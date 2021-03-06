<?php
    class ErrorPage{
        public static function showError($dir, $result){
            $sess = new Sess();
            Header::initHeader($dir, "Error " . $result->err->code); //initialize HTML header elements with '<<someone name>> 's Profile' as Title

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
                                  <h1 class="display-4"><i class="far fa-frown"></i>&nbsp; Error <?php echo $result->err->code ?></h1>
                                  <p class="lead"><?php echo $result->err->msg ?>!</p>
                                  <hr class="my-4">
                                  <p>หากคุณพบปัญหาขัดข้อง คุณสามารถย้อนกลับไปหน้าเดิม หรือส่งรายงานข้อผิดพลาดได้</p>
                                  <a class="btn btn-outline-secondary btn-lg" href="<?php Nav::echoPrevious(); ?>" role="button"><i class="fas fa-arrow-left mr-2"></i> ย้อนกลับ</a>
                                  <a class="btn btn-danger btn-lg" href="<?php Nav::echoURL($dir, App::$pageFeedback . "?err=" . $result->err->code); ?>" role="button"><i class="fas fa-bug mr-2"></i> รายงานข้อผิดพลาด</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            
                                
<?php
            Console::log('Result', $result);
            Script::initScript($dir); 
            Footer::initFooter($dir); //initialize HTML footer elements

        }
    }
?>