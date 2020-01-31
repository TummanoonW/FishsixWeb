<?php
    class OrderView{
        public static function initView($dir, $sess, $paths, $order){
            if($order != NULL)$orderItems = $order->orderItems;
            ?>
                <body class=" layout-fluid">

                    <!-- Pre Loader -->
                    <?php Preloader::initPreloader($dir) ?>

                    <!-- Header Layout -->
                    <div class="mdk-header-layout js-mdk-header-layout">

                        <!-- Header -->
                        <?php Toolbar::initToolbar($dir, '', $sess) ?>
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
                                                                    <?php self::initBtnStatus($dir, $order->status) ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <p class="text-black-70 m-0"><strong>ผู้ชำระเงิน</strong></p>
                                                                        <h2><?php echo $order->ownerName ?></h2>
                                                                        <div class="text-black-50">
                                                                            <?php echo $order->ownerAddress ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <p class="text-black-70 m-0"><strong>ผู้รับชำระเงิน</strong></p>
                                                                        <h2><?php echo $order->hostName ?></h2>
                                                                        <div class="text-black-50">
                                                                            <?php echo $order->hostAddress ?>
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
                                                                <?php self::initItems($dir, $orderItems) ?>
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
                                                                    <td style="width: 120px;" class="text-right"><strong>&#3647;<?php echo $order->totalPrice ?> บาท</strong></td>
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
                                                <?php }else{ 
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
                                                                    <a href="#" class="nav-link <?php if($order->status == 'pending') echo 'active' ?>">รอการตรวจสอบ</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <?php if($order->status == 'confirm') echo 'active' ?>">ยืนยันแล้ว</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <?php if($order->status == 'rejected') echo 'active' ?>">
                                                                        <?php 
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
                                                    <a class="" href="<?php echo $order->slip_pic ?>" target="_blank">
                                                        <img class="" style="object-fit: cover;background: black;width: 200px;height: auto;" src="<?php echo $order->slip_pic ?>" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                            </div>
                        </div>
                    </div>
                    <?php Script::initScript($dir) ?>
            <?php
        }

        private static function initBtnStatus($dir, $status){
            switch($status){
                case 'pending':
                    ?>
                        <a href="#status" class="btn btn-secondary">รอการตรวจสอบ</a>
                    <?php
                    break;
                case 'confirm':
                    ?>
                        <a href="#status" class="btn btn-success">ยืนยันแล้ว</a>
                    <?php
                    break;
                case 'rejected':
                    ?>
                        <a href="#status" class="btn btn-danger">ถูกปฏิเสธ</a>
                    <?php
                    break;
                default:
                    ?>
                        <a href="#status" class="btn btn-light">ไม่ทราบสถานะ</a>
                    <?php
                    break;
            }
        }

        private static function initItems($dir, $orderItems){
            foreach ($orderItems as $key => $item) {
                $course = $item->course;
                ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageCourseView . '?id=' . $course->ID) ?>" class="avatar avatar-4by3 avatar-sm mr-3">
                                    <img src="<?php Asset::echoThumb($dir, $course->thumbnail) ?>" alt="<?php echo $course->title ?>" class="avatar-img rounded">
                                </a>
                                <div class="flex">
                                    <a href="<?php Nav::echoURL($dir, App::$pageCourseView . '?id=' . $course->ID) ?>" class="text-body">
                                        <strong><?php echo $course->title . " ($item->credit)" ?></strong>
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td class="text-right"><strong>&#3647;<?php echo $item->price ?> บาท</strong></td>
                    </tr>
                <?php
            }
        }
    }
?>