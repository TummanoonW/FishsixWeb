<?php
    class AdminViewFeedback{
        public static function initView($dir, $paths, $feedback){
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

                                                <?php if($feedback != NULL){ ?>
                                                    <div id="invoice">
                                                        <div class="card">
                                                            <div class="card-header media align-items-center">
                                                                <div class="media-body">
                                                                    <h1 class="card-title h2">รายนงานข้อผิดพลาด </h1>
                                                                    <div class="card-subtitle">รหัสเอกสาร #<?php echo $feedback->ID ?> / <?php echo $feedback->date ?></div>
                                                                </div>
                                                                <div class="media-right d-flex align-items-center">
                                                                    <a href="javascript:window.print()" class="btn btn-flush text-muted d-print-none mr-3"><i class="material-icons font-size-24pt">print</i></a>
                                                                    <?php self::initBtnStatus($dir, $feedback->status, $feedback->ID) ?>
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <p class="text-black-70 m-0"><strong>Error Code: <?php echo $feedback->err; ?></strong></p>
                                                                <h2><?php echo $feedback->title  ?></h2>
                                                                <div class="text-black-50">
                                                                    <? echo $feedback->description ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php 
                                                    }else{ 
                                                        Alert::initAlert($dir, "ขออภัย! เราไม่พบคำสั่งซื้อที่คุณต้องการ");
                                                    } 
                                                ?>
                                            </div>
                                            <div id="status" class="col-lg-auto container-fluid page__container">
                                                <h3>สถานะ</h3>
                                                <div id="page-nav" class="page-nav">
                                                    <div data-perfect-scrollbar>
                                                        <div class="page-section pt-lg-32pt">
                                                            <ul class="nav page-nav__menu">
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <? if($feedback->status == 'unread') echo 'active' ?>">ยังไม่อ่าน</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <? if($feedback->status == 'read') echo 'active' ?>">อ่านแล้ว</a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a href="#" class="nav-link <? if($feedback->status == 'spam') echo 'active' ?>">
                                                                        <? 
                                                                            if($feedback->status == 'spam') echo 'สแปม'; 
                                                                            else echo '<span class="text-muted">สแปม</span>';
                                                                        ?>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <h3>ข้อมูลติดต่อผู้รายงาน</h3>
                                                    <p><i class="fas fa-envelope text-primary text-primary mr-2"></i><? echo $feedback->email ?></p>
                                                <?php if(!$feedback->isGuest){ ?><p><i class="fas fa-user text-primary text-primary mr-2"></i><?php echo $feedback->auth->username ?></p><?php } ?>
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
            <?
        }

        private static function initBtnStatus($dir, $status, $id){
            switch($status){
                case 'unread':
                    $color = "btn-secondary";
                    $label = "ยังไม่ได้อ่าน";
                    break;
                case 'read':
                    $color = "btn-success";
                    $label = "อ่านแล้ว";
                    break;
                case 'spam':
                    $color = "btn-danger";
                    $label = "สแปม";
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
                    <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=read&id=$id") ?>">อ่านแล้ว</a>
                    <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=unread&id=$id") ?>">ยังไม่อ่าน</a>
                    <div role="separator" class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=spam&id=$id") ?>">สแปม</a>
                    <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=delete&id=$id") ?>">ลบ</a>
                  </div>
                </div>
            <?
        }

        
    }