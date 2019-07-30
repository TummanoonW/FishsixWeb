<?php
    class MyCartView{
        public static function initView($dir, $paths, $cart){
            
?>
            <body class=" layout-fluid">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir); ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->    
                    <div class="mdk-header-layout__content" style="padding-top: 64px;">

                        <div data-push="" data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout" data-domfactory-upgraded="mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page " style="transform: translate3d(0px, 0px, 0px);">

                                <div class="container-fluid page__container">
                                    <!-- Navigation Paths -->
                                    <?php NavPath::initNavPath($dir, $paths); ?>
                                    <h1 class="h2">Shopping Cart</h1>
                                    <div class="card table-responsive">
                                        <table class="table table-nowrap mb-0 table--elevated">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Details</th>
                                                    <th style="width: 100px" class="text-center">Qty</th>
                                                    <th style="width: 100px" class="text-right">Total</th>
                                                    <th style="width: 10px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="<?php Nav::printURL($dir,'student-view-course.html');?> " class="avatar avatar-4by3 avatar-sm mr-3">
                                                                <img src="<?php Asset::printThumb($dir,'assets/images/gulp.png');?> " alt="Learn Vue.js Fundamentals" class="avatar-img rounded">
                                                            </a>
                                                            <div class="media-body">
                                                                <a href="#" class="text-body"><strong>Learn Vue.js Fundamentals</strong></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">remove</i></a>
                                                            <input type="number" class="form-control" style="width: 64px;" value="1">
                                                            <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">add</i></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <p class="mb-0">$20.00 USD</p>

                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="text-muted"><i class="material-icons font-size-24pt">close</i></a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="<?php Nav::printURL($dir,'student-view-course.html');?> " class="avatar avatar-4by3 avatar-sm mr-3">
                                                                <img src="<?php Asset::printThumb($dir,'assets/images/vuejs.png');?> " alt="Angular in Steps" class="avatar-img rounded">
                                                            </a>
                                                            <div class="media-body">
                                                                <a href="#" class="text-body"><strong>Angular in Steps</strong></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">remove</i></a>
                                                            <input type="number" class="form-control" style="width: 64px;" value="2">
                                                            <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">add</i></a>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <p class="mb-0">$20.00 USD</p>

                                                        <small class="text-black-50"><strong>Total</strong>: $40 USD</small>

                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="text-muted"><i class="material-icons font-size-24pt">close</i></a>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <table class="table mb-0">
                                            <tfoot>
                                                <tr>
                                                    <td class="text-right text-black-70"><strong>Subtotal</strong></td>
                                                    <td style="width: 100px;" class="text-right"><strong>$40 USD</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-black-70"><strong>20% Discount</strong></td>
                                                    <td style="width: 100px;" class="text-right"><strong>-$8 USD</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right text-black-70"><strong>Total</strong></td>
                                                    <td style="width: 100px;" class="text-right"><strong>$32 USD</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="card-footer d-flex align-items-center">
                                            <a href="<?php Nav::printHome() ?> " class="btn btn-white">Back to Courses</a>
                                            <a href="<?php Nav::printURL($dir, App::$pageCheckOut) ?> " class="btn btn-success ml-auto">
                                                Pay Now <i class="material-icons btn__icon--right">credit_card</i>
                                            </a>
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
<?php
        }

        public static function initRow($dir, $item){
?>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="<?php Nav::printURL($dir, App::$pageCourseView . "?id=" . $item->courseID) ?> " class="avatar avatar-4by3 avatar-sm mr-3">
                            <img src="<?php Asset::printThumb($dir, $item->course->thumbnail) ?> " alt="<?php echo $item->course->title ?>" class="avatar-img rounded">
                        </a>
                        <div class="media-body">
                            <a href="#" class="text-body"><strong><?php echo $item->course->title ?></strong></a>
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <div class="d-flex align-items-center">
                        <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">remove</i></a>
                        <input type="number" class="form-control" style="width: 64px" value="<?php echo $item->credit ?>">
                        <a href="#" class="text-muted px-2"><i class="material-icons font-size-16pt">add</i></a>
                    </div>
                </td>
                <td class="text-right">
                    <p class="mb-0">&#3647;<?php echo self::calPrice($item->credit, $item->course->minPrice) ?> THB</p>
                </td>
                <td class="text-center">
                    <a href="#" class="text-muted"><i class="material-icons font-size-24pt">close</i></a>
                </td>
            </tr>
<?php
        }

        public static function calPrice($credit, $rate){
            return $credit * $rate;
        }
    }
?>