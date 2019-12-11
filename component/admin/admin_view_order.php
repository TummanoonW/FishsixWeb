<?php
    class AdminViewOrder{
        public static function initView($dir, $paths, $order, $owner){
            if($order != NULL)$orderItems = $order->orderItems;
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
                        <div class="mdk-header-layout__content">

                            <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                                <div class="mdk-drawer-layout__content page ">

                                    <div class="container-fluid page__container p-0">
                                        <div class="row m-0">
                                            <div class="col-lg container-fluid page__container">

                                                <!-- Navigation Paths -->
                                                <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                                <?php if($order != NULL){ ?>
                                                    <div id="invoice">
                                                        <div class="card">
                                                            <div class="card-header media align-items-center">
                                                                <div class="media-body">
                                                                    <h1 class="card-title h2">คำสั่งซื้อ </h1>
                                                                    <div class="card-subtitle">รหัสคำสั่งซื้อ #<?php echo $order->ID ?> / <?php echo $order->date ?></div>
                                                                </div>
                                                                <div class="media-right d-flex align-items-center">
                                                                    <a href="javascript:window.print()" class="btn btn-flush text-muted d-print-none mr-3"><i class="material-icons font-size-24pt">print</i></a>
                                                                    <?php self::initBtnStatus($dir, $order->status, $order->ID) ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="text-black-70 m-0"><strong>ผู้รับชำระเงิน</strong></p>
                                                                        <h2><? echo $order->hostName ?></h2>
                                                                        <div class="text-black-50">
                                                                            <? echo $order->hostAddress ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p class="text-black-70 m-0"><strong>ผู้ชำระเงิน</strong></p>
                                                                        <h2><? echo $order->ownerName ?></h2>
                                                                        <div class="text-black-50">
                                                                            <? echo $order->ownerAddress ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card table-responsive">
                                                        <table class="table mb-0 table--elevated">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th class="border-top-0">รายการสินค้า</th>
                                                                    <th class="border-top-0 text-right" style="width: 120px;">จำนวนเงิน</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <? self::initItems($dir, $orderItems) ?>
                                                                <!--<tr>
                                                                    <td>
                                                                        <p class="mb-1"><strong>Basic Plan - Monthly Subscription</strong></p>
                                                                        <p class="text-black-50 mb-0 small">For the period of June 20, 2018 to July 20, 2018</p>
                                                                    </td>
                                                                    <td class="text-right"><strong>&dollar;9.00 USD</strong></td>
                                                                </tr>-->
                                                                <!--<tr>
                                                                    <td><strong>Credit discount</strong></td>
                                                                    <td class="text-right"><strong>-&dollar;5.00 USD</strong></td>
                                                                </tr>-->
                                                            </tbody>
                                                        </table>

                                                        <table class="table mb-0">
                                                            <tfoot>
                                                                <!--<tr>
                                                                    <td class="text-right text-black-70"><strong>Subtotal</strong></td>
                                                                    <td style="width: 120px;" class="text-right"><strong>&dollar;89.00 USD</strong></td>
                                                                </tr>-->
                                                                <tr>
                                                                    <td class="text-right text-black-70"><strong>รวมยอดชำระ</strong></td>
                                                                    <td style="width: 120px;" class="text-right"><strong>&#3647;<? echo $order->totalPrice ?> บาท</strong></td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                    <div class="px-16pt mb-4">
                                                        <p class="text-black-70 mb-8pt"><strong>ชำระเงินด้วยวิธี (โอนผ่านบัญชีธนาคาร)</strong></p>
                                                        <div class="d-flex">
                                                            <div class="mr-3">
                                                                <i class="fas fa-money-check" style="font-size: 24px"></i>
                                                            </div>
                                                            <div class="flex text-black-50">
                                                                คุณไม่จำเป็นต้องทำธุรกรรมใดๆเพิ่มเติมอีก. Your credit card Visa ending in 2819 has been charged on January 12, 2019.
                                                            </div>
                                                        </div>
                                                    </div>
                                                <? }else{ 
                                                        Alert::initAlert($dir, "ขออภัย! เราไม่พบคำสั่งซื้อที่คุณต้องการ");
                                                   } 
                                                ?>
                                            </div>
                                            <div id="status" class="col-lg-auto container-fluid page__container">
                                                <h3>สถานะคำสั่งซื้อ</h3>
                                                <div id="page-nav" class="page-nav">
                                                    <div data-perfect-scrollbar>
                                                        <div class="page-section pt-lg-32pt">
                                                            <ul class="nav page-nav__menu">
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <? if($order->status == 'pending') echo 'active' ?>">รอการตรวจสอบ</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <? if($order->status == 'confirm') echo 'active' ?>">ยืนยันแล้ว</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <? if($order->status == 'rejected') echo 'active' ?>">
                                                                        <? 
                                                                            if($order->status == 'rejected') echo 'ถูกปฏิเสธ'; 
                                                                            else echo '<span class="text-muted">ถูกปฏิเสธ</span>';
                                                                        ?>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <h3>ภาพใบเสร็จแนบ</h3>
                                                    <a class="" href="<? echo $order->slip_pic ?>" target="_blank">
                                                        <img class="" style="object-fit: cover;background: black;width: 200px;height: auto;" src="<? echo $order->slip_pic ?>" />
                                                    </a>
                                                </div>
                                                <div class="mt-4">
                                                    <h3>ข้อมูลติดต่อลูกค้า</h3>
                                                    <p><i class="fas fa-envelope text-primary text-primary mr-2"></i><? echo $owner->auth->email ?></p>
                                                    <p><i class="fas fa-phone text-primary text-primary mr-2"></i><? echo $owner->user->phone ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php Sidemenu::initSideMenu($dir) ?>
                            </div>
                        </div>
                    </div>
                    <?php Script::customScript($dir, 'common.js') ?>
                    <?php Script::initScript($dir) ?>
            <?
        }

        private static function initBtnStatus($dir, $status, $id){
            switch($status){
                case 'pending':
                    $color = "btn-secondary";
                    $label = "รอการยืนยัน";
                    break;
                case 'confirm':
                    $color = "btn-success";
                    $label = "ยืนยันแล้ว";
                    break;
                case 'rejected':
                    $color = "btn-danger";
                    $label = "ถูกปฏิเสธ";
                    break;
                default:
                    $color = "btn-primary";
                    $label = "จัดการ";
                    break;
            }

            ?>
                <div class="input-group-append">
                  <button class="btn <? echo $color ?> dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><? echo $label ?></button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=confirm&id=$id") ?>">ยืนยัน</a>
                    <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=pending&id=$id") ?>">รอการตรวจสอบ</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$routeAdminOrder . "?m=rejected&id=$id") ?>">ปฏิเสธ</a>
                  </div>
                </div>
            <?
        }

        private static function initItems($dir, $orderItems){
            foreach ($orderItems as $key => $item) {
                $course = $item->course;
                ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<? Nav::echoURL($dir, App::$pageCourseView . '?id=' . $course->ID) ?>" class="avatar avatar-4by3 avatar-sm mr-3">
                                    <img src="<? Asset::echoThumb($dir, $course->thumbnail) ?>" alt="<? echo $course->title ?>" class="avatar-img rounded">
                                </a>
                                <div class="flex">
                                    <a href="<? Nav::echoURL($dir, App::$pageCourseView . '?id=' . $course->ID) ?>" class="text-body">
                                        <strong><? echo $course->title . " ($item->credit)" ?></strong>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right"><strong>&#3647;<? echo $item->price ?> บาท</strong></td>
                    </tr>
                <?php
            }
        }
    }