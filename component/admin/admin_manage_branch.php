<?php
    class AdminManageBranchView{
        public static function initView($dir, $paths, $pages){
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
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">Manage Branch</h1>
                                        </div> <!-- ต้องแก้ --->
                                        <a href="<?php Nav::echoURL($dir, App::$pageAdminAddBranch) ?>" class="btn btn-success">Add Branch</a>
                                    </div>
                                    <!--- Card Branch --->
                                    <div class="card" >
                                        <div class="card-header d-flex align-items-center" >
                                            <div class="flex">
                                                <a href="../admin/edit-branch.php" >
                                                    <img src="../assets/images/thumbs/def.png" alt="สาขางามวงศ์วาน" class="avatar-img rounded">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <h2 class="card-title mb-1">สาขา งามวงศ์วาน</h2>
                                                    <table class="text-black-70">
                                                      <tr>
                                                        <td>เปิดสอนวิชา</td>
                                                        <td style="padding-left:16px;">คณิตและฟิสิกส์</td>
                                                      </tr>
                                                      <tr>
                                                        <td>วันจันทร์เวลา</td>
                                                        <td style="padding-left:16px;">10:00 - 19:00 น.</td>
                                                      </tr>
                                                      <tr>
                                                        <td>วันเสาร์ – อาทิตย์</td>
                                                        <td style="padding-left:16px;">8:00 - 17:00 น.</td>
                                                      </tr>
                                                      <tr>
                                                          <td>โทรศัพท์</td>
                                                          <td style="padding-left:16px;">098-974-8688</td>
                                                      </tr>
                                                    </table>
                                                <?php self::initBtn($dir); ?>
                                            </div>
                                        </div>
                                    </div>
                                      
                                      <div class="card">
                                      <div class="card-header d-flex align-items-center">
                                        <div class="flex">
                                        
                                          <a href="../admin/edit-branch.php" >
                                            <img src="../assets/images/thumbs/def.png" alt="สาขาสยาม" class="avatar-img rounded">
                                            </a>
                                        </div>
                                            <div class="card-body">
                                            <h2 class="card-title mb-1">สาขา สยาม</h2>
                                            <table class="text-black-70">
                                                      <tr>
                                                        <td>เปิดสอนวิชา</td>
                                                        <td style="padding-left:16px;">คณิตและฟิสิกส์</td>
                                                      </tr>
                                                      <tr>
                                                        <td>วันจันทร์เวลา</td>
                                                        <td style="padding-left:16px;">16:00 - 19:00 น.</td>
                                                      </tr>
                                                      <tr>
                                                        <td>วันเสาร์ – อาทิตย์</td>
                                                        <td style="padding-left:16px;">8:00- 17:00 น.</td>
                                                      </tr>
                                                      <tr>
                                                          <td>โทรศัพท์</td>
                                                          <td style="padding-left:16px;">098-974-8688</td>
                                                      </tr>
                                                    </table>
                                                <?php self::initBtn($dir); ?>
                                            </div>
                                      </div>

                                      <div class="card">
                                      <div class="card-header d-flex align-items-center">
                                        <div class="flex">
                                        
                                          <a href="../admin/edit-branch.php" >
                                            <img src="../assets/images/thumbs/def.png" alt="สาขาพระราม2" class="avatar-img rounded">
                                            </a>
                                        </div>
                                            <div class="card-body">
                                            <h2 class="card-title mb-1">สาขา พระราม 2</h2>
                                            <table class="text-black-70">
                                                      <tr>
                                                        <td>เปิดสอนวิชา</td>
                                                        <td style="padding-left:16px;">คณิตและฟิสิกส์</td>
                                                      </tr>
                                                      <tr>
                                                        <td>อาทิตย์</td>
                                                        <td style="padding-left:16px;">9:00- 16:00 น.</td>
                                                      </tr>
                                                      <tr>
                                                          <td>โทรศัพท์</td>
                                                          <td style="padding-left:16px;">098-974-8688</td>
                                                      </tr>
                                                    </table>
                                                <?php self::initBtn($dir); ?>
                                            </div>
                                      </div>
                                    </div>
                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir) ?>
                        </div>
                    </div>
                </div>   
                <?php Script::initScript($dir) ?> 

<?php
        }
        public static function initBtn($dir){
?>
        <div>
            <div class="text-center">
                <a href="../admin/edit-branch.php" class="btn btn-primary btn-sm float-right"><i class="material-icons btn__icon--left">edit</i>Edit</a>
                <button onclick="return confirm('Are you sure?');" class="btn btn-default btn-sm float-right" style="margin-right:8px;" ><i class="material-icons btn__icon--left">delete_forever</i>Delete</button>
            </div>
        </div>
        
        

<?php
        }

    }
?>
            