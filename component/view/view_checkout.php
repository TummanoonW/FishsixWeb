<?php
    class CheckOutView{
        public static function initView($dir, $paths){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">
                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '') ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                        <div class="mdk-header-layout__content" style="padding-top: 64px">
                            <div data-push="" data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout" data-domfactory-upgraded="mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page " style="transform: translate3d(0px, 0px, 0px)">
                                <div class="container-fluid page__container">
                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>
                                    <h1 class="h2">ชำระสินค้า</h1>
                                    <div class="row">
                                        <div class="col-lg">
                                            <ul class="card list-group list-group-fit">
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <span class="btn btn-default btn-circle"><i class="material-icons">credit_card</i></span>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-0">**** **** **** 2422</p>
                                                            <small class="text-muted">Updated on 12/02/2016</small>
                                                        </div>
                                                        <div class="media-right">
                                                            <a href="#" class="btn btn-primary">Pay</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <span class="btn btn-white btn-circle"><i class="material-icons">credit_card</i></span>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="mb-0">**** **** **** 6321</p>
                                                            <small class="text-muted">Updated on 11/01/2016</small>
                                                        </div>
                                                        <div class="media-right">
                                                            <a href="#" class="btn btn-primary">Pay</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <div class="media-left">
                                                            <span class="btn btn-white btn-circle">
                                                                <i class="fab fa-paypal"></i>
                                                            </span>
                                                        </div>
                                                        <div class="media-body">
                                                            PayPal
                                                        </div>
                                                        <div class="media-right">
                                                            <a href="#" class="btn btn-default">Pay</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg">
                                            <div class="card">
                                                <form action="#" class="form-horizontal">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label class="form-label">Card Number:</label>
                                                            <input type="text" class="form-control" placeholder="XXXX XXXX XXXX XXXX XXXX">
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="cvc" class="col-form-label form-label col-md-4">CVC:</label>
                                                            <div class="col-md-8">
                                                                <input id="cvc" type="text" class="form-control" placeholder="123" style="width:80px">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="expires" class="col-form-label form-label col-md-4">Expires:</label>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <select id="expires" class="custom-control custom-select form-control">
                                                                            <option value="1">January</option>
                                                                            <option value="2">February</option>
                                                                            <option value="3">March</option>
                                                                            <option value="4">April</option>
                                                                            <option value="5">May</option>
                                                                            <option value="6">June</option>
                                                                            <option value="7">July</option>
                                                                            <option value="8">August</option>
                                                                            <option value="9">September</option>
                                                                            <option value="10">October</option>
                                                                            <option value="11">Novemeber</option>
                                                                            <option value="12">December</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <select class="custom-control custom-select form-control">
                                                                            <option value="1" selected="">2016</option>
                                                                            <option value="2">2017</option>
                                                                            <option value="3">2018</option>
                                                                            <option value="3">2019</option>
                                                                            <option value="3">2020</option>
                                                                            <option value="3">2021</option>
                                                                            <option value="3">2022</option>
                                                                            <option value="3">2023</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer text-center">
                                                        <button type="submit" class="btn btn-success">Make Payment</button>
                                                    </div>
                                                </form>
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