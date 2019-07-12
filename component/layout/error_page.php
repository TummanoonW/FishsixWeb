<?php
    class ErrorPage{
        public static function showError($dir, $result){

            Header::initHeader($dir, "Error " . $result->err->code); //initialize HTML header elements with '<<someone name>> 's Profile' as Title

?>
            <body class=" layout-fluid">

                <div class="preloader">
                    <div class="sk-double-bounce">
                        <div class="sk-child sk-double-bounce1"></div>
                        <div class="sk-child sk-double-bounce2"></div>
                    </div>
                </div>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir); ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">
                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="student-dashboard.html">Home</a></li>
                                        <li class="breadcrumb-item active">Error</li>
                                    </ol>
                                    <h1 class="h2"><?php echo "Error " . $result->err->code . ": " . $result->err->msg ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            
                                
<?php

            Footer::initFooter($dir); //initialize HTML footer elements

        }
    }
?>