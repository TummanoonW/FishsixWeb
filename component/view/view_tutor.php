<?php
    class ViewReview{ ////profile HTML elements loader

        public static function initView($dir, $sess, $paths){
?>
            <body class=" layout-fluid">
                <!-- Flatpickr -->
                <link type="text/css" href="assets/css/flatpickr.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr.rtl.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr-airbnb.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr-airbnb.rtl.css" rel="stylesheet">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir, '', $sess) ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <h1 class="h2">ผู้สอน</h1>
                                    <iframe class="mt-3 w-100 h-100" src="https://fishsix.in.th/tutor/"></iframe>
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?>
                <!-- Flatpickr -->
                <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
                <script src="assets/js/flatpickr.js"></script>
                <!-- jQuery Mask Plugin -->
                <script src="assets/vendor/jquery.mask.min.js"></script>
                
                
<?php
        }

    }