<?php
    class BookingClass{
        public static function initView($dir, $paths){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
                <!-- Pre Loader -->
                
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
                                            <h1 class="h2">Booking Class</h1>
                                        </div>
                                    </div>
                                    <form action="<?php Nav::echoURL($dir, App::$pageMySchedule); ?>" novalidate method="POST">
                                        <table class="table table-nowrap mb-0 table--elevated">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="media-body">
                                                                    <a href="#" class="text-body"><strong>สาขา</strong></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <select class="form-control" style="width: 800px;">
                                                                    <option value="" disabled selected hidden>เลือกสาขา</option>
                                                                    <option value="branch1">สาขา งามวงศ์วาน</option>
                                                                    <option value="branch2">สาขา สยาม</option>
                                                                    <option value="branch3">สาขา พระราม2</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="media-body">
                                                                    <a href="#" class="text-body"><strong>รอบเรียน</strong></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="d-flex align-items-center">
                                                                <select class="form-control" style="width: 800px;">
                                                                    <option value="" disabled selected hidden>เลือกรอบเรียน</option>
                                                                    <option value="branch1">9.00 น. - 12.00 น.</option>
                                                                    <option value="branch2">13.00 น. - 15.00 น.</option>
                                                                    <option value="branch3">16.00 น. - 17.00 น.</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div style="margin-top: 20px;text-align:center">
                                             <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-success ml-auto">Book now</button>
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
    }
?>