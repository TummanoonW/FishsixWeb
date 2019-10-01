<?php
    class BookingClass{
        public static function initView($dir, $paths, $ownership, $course, $classes, $branches){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>
                
                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, ''); ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths); ?>

                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">จองรอบเรียน <? echo $course->title ?></h1>
                                        </div>
                                    </div>
                                    <form action="<?php Nav::echoURL($dir, App::$routeBookClass . "?m=book"); ?>" method="POST">
                                        <table class="table table-nowrap mb-0 table--elevated">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="media-body">
                                                                    <strong>สาขา</strong>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <select name="cBranchID" class="form-control">
                                                                    <option value="" selected>เลือกสาขา</option>
                                                                    <?php self::initBranches($dir, $branches) ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="media-body">
                                                                    <strong>รอบเรียน</strong>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <select name="cClassID" class="form-control">
                                                                    <option value="" selected>เลือกรอบเรียน</option>
                                                                    <?php self::initClasses($dir, $classes) ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr style="visibility: collapse;">
                                                        <td></td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <input type="text" name="ownershipID" value="<?php echo $ownership->ID ?>" readonly>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: 20px;text-align:center">
                                             <button type="submit" onclick="return confirm('คุณต้องการจองรอบเรียนนี้ใช่ไหม?');" class="btn btn-success ml-auto">จองรอบเรียน</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php Sidemenu::initSideMenu($dir); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir); ?>


<?php
        }

        private static function initBranches($dir, $branches){
            foreach ($branches as $key => $b) {
                ?>
                    <option value="<? echo $b->ID ?>">สาขา <? echo $b->branch->title ?></option>
                <?
            }
        }

        private static function initClasses($dir, $classes){
            foreach ($classes as $key => $c) {
                ?>
                    <option value="<? echo $c->ID ?>"><?echo $c->startTime?> น. - <?echo $c->endTime?> น.</option>
                <?
            }
        }
    }
?>