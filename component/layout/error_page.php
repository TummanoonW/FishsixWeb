<?php
    class ErrorPage{
        public static function showError($dir, $result){

            Header::initHeader($dir, "Error " . $result->err->code); //initialize HTML header elements with '<<someone name>> 's Profile' as Title

?>
            <body class=" layout-fluid">

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir); ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">
                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">
                                    <h1 class="h2">Error <?php echo $result->err->code; ?></h1>
                                    <h1 class="h4"><?php echo $result->err->msg; ?></h1>
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
?>