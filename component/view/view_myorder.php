<?php
    class MyOrderview{
        public static function initView($dir, $paths){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">
                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                        <div class="mdk-header-layout__content" style="padding-top: 64px">
                            <div data-push="" data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout" data-domfactory-upgraded="mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page " style="transform: translate3d(0px, 0px, 0px)">
                                <div class="container-fluid page__container">
                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>
                                    <h1 class="h2">My Order</h1>

                                        <div class="card card-body border-left-3 border-left-primary navbar-shadow mb-4">
                                            <form action="#">
                                                <div class="d-flex flex-wrap2 align-items-center mb-headings">

                                                    <div class="flex search-form ml-3 search-form--light">
                                                        <input type="text" class="form-control" placeholder="Search Order" id="searchSample02">
                                                        <button class="btn" type="button" role="button"><i class="material-icons">search</i></button>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-column flex-sm-row align-items-sm-center" style="white-space: nowrap">
                                                    <small class="flex text-muted text-uppercase mr-3 mb-2 mb-sm-0">Displaying 4 out of 10 Order</small>
                                                    <div class="w-auto ml-sm-auto table d-flex align-items-center mb-0">
                                                        <small class="text-muted text-uppercase mr-3 d-none d-sm-block">Sort by</small>
                                                        <a href="#" class="sort small text-uppercase ml-2">Course name</a>
                                                        <a href="#" class="sort small text-uppercase ml-2">Date</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="card table-responsive">
                                            <table class="table table-nowrap mb-0 table--elevated">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>OrderID:#0000000001</th>
                                                        <th style="width: 100px" class="text-center">Purchased Date: </th>
                                                        <th style="width: 100px" class="text-center">Qty</th>
                                                        <th style="width: 100px" class="text-right">Total</th>
                                                        <th style="width: 100px">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="<?php Nav::echoURL($dir,App::$pageCourseView);?> " class="avatar avatar-4by3 avatar-sm mr-3">
                                                                    <img src="<?php Asset::echoThumb($dir,'assets/images/gulp.png');?> " alt="Learn Vue.js Fundamentals" class="avatar-img rounded">
                                                                </a>
                                                                <div class="media-body">
                                                                    <a href="<?php Nav::echoURL($dir,App::$pageCourseView);?> " class="text-body"><strong>Learn Vue.js Fundamentals</strong></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>18/8/2019</td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                
                                                                <input type="number" class="form-control" style="width: 64px;" value="1" disabled>
                                                                
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="mb-0">$20.00 USD</p>

                                                        </td>
                                                        <td>Pending</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <table class="table mb-0">
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>Subtotal</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>$20 USD</strong></td>
                                                    </tr>
                                                
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>VAT 7 %</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>+$2.8 USD</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>20% Discount</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>-$8 USD</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>Total</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>$14.8 USD</strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="card-footer d-flex align-items-center">

                                                <a href="#" class="btn btn-success ml-auto">
                                                    Print receipt <i class="fas fa-print btn__icon--right"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="card table-responsive">
                                            <table class="table table-nowrap mb-0 table--elevated">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>OrderID:#0000000001</th>
                                                        <th style="width: 100px" class="text-center">Purchased Date:</th>
                                                        <th style="width: 100px" class="text-center">Qty</th>
                                                        <th style="width: 100px" class="text-right">Total</th>
                                                        <th style="width: 100px">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <a href="<?php Nav::echoURL($dir,App::$pageCourseView);?>  " class="avatar avatar-4by3 avatar-sm mr-3">
                                                                    <img src="<?php Asset::echoThumb($dir,'assets/images/gulp.png');?> " alt="Learn Vue.js Fundamentals" class="avatar-img rounded">
                                                                </a>
                                                                <div class="media-body">
                                                                    <a href="<?php Nav::echoURL($dir,App::$pageCourseView);?> " class="text-body"><strong>Learn Vue.js Fundamentals</strong></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td> 18/8/2019</td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                
                                                                <input type="number" class="form-control" style="width: 64px;" value="1" disabled>
                                                                
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            <p class="mb-0">$20.00 USD</p>

                                                        </td>
                                                        <td>Complete</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <table class="table mb-0">
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>Subtotal</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>$20 USD</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>VAT 7 %</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>+$2.8 USD</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>20% Discount</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>-$8 USD</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-right text-black-70"><strong>Total</strong></td>
                                                        <td style="width: 100px;" class="text-right"><strong>$14.8 USD</strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <div class="card-footer d-flex align-items-center">
                                                <a href="#" class="btn btn-success ml-auto">
                                                    Print receipt <i class="fas fa-print btn__icon--right"></i>
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
    }
?>