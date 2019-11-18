<?php
    class AdminManageFeedbacksView{
        public static function initView($dir, $paths, $pages, $feedbacks){
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

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <div class="d-flex flex-column flex-sm-row flex-wrap mb-headings align-items-start align-items-sm-center">
                                        <div class="flex mb-2 mb-sm-0">
                                            <h1 class="h2">จัดการรายงานข้อผิดพลาด</h1>
                                        </div> 
                                    </div>

                                    <?php if(count($feedbacks) > 0){ ?>
                                        <div class="card table-responsive" data-toggle="lists" data-lists-values='["ID", "title", "user", "error", "status", "date"]'>
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="ID">รหัสเอกสาร</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="title">หัวเรื่อง</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="user">ผู้รายงาน</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="error">Error Code</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="status">สถานะ</a>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="sort" data-sort="date">วันที่</a>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    <? self::initItems($dir, $feedbacks) ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php }else{ 
                                        Alert::initAlert($dir, "คุณไม่มีรายการคำสั่งซื้อให้แสดง");
                                    } ?>

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

        private static function initItems($dir, $feedbacks){
            foreach ($feedbacks as $key => $item) {
                $id = $item->ID;
                $isGuest = $item->isGuest;
                ?>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminViewFeedback . "?id=$id") ?>" class="text-body small">#<span class="ID"><? echo $id ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="<?php Nav::echoURL($dir, App::$pageAdminViewFeedback . "?id=$id") ?>" class="text-body small"><span class="title"><? echo $item->title ?></span></a>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="#" class="text-body small"><span class="user"><? if($isGuest) echo $item->email; else echo $item->auth->username; ?></span></a>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <small class="text-uppercase"><span class="error"><?php echo $item->err ?></span></small>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <? switch($item->status){
                                    case 'unread':
                                ?>
                                        <i class="material-icons text-secondary md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">ยังไม่อ่าน</small>
                                <?
                                        break;
                                    case 'read':
                                ?>
                                        <i class="material-icons text-success md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">อ่านแล้ว</small>
                                <?
                                        break;
                                    case 'spam':
                                ?>
                                        <i class="material-icons text-danger md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">สแปม</small>
                                <?
                                        break;
                                    default: 
                                ?>
                                        <i class="material-icons text-light md-18 mr-2">lens</i>
                                        <small class="text-uppercase status">ไม่ทราบสถานะ</small>
                                <?      break;
                                    } 
                                ?>
                            </div>
                        </td>
                        <td class="text-right">
                            <div class="d-flex align-items-center text-right">
                                <small class="text-uppercase date"><? echo $item->date ?></small>
                            </div>
                        </td>
                        <td>
                            <div class="input-group-append">
                              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">จัดการ</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=read&id=$id") ?>">อ่านแล้ว</a>
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=unread&id=$id") ?>">ยังไม่อ่าน</a>
                                <a class="dropdown-item" href="<?php Nav::echoURL($dir, App::$pageAdminViewFeedback . "?id=$id") ?>">ดูรายละเอียด</a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=spam&id=$id") ?>">สแปม</a>
                                <a class="dropdown-item text-danger" href="<?php Nav::echoURL($dir, App::$routeAdminFeedback . "?m=delete&id=$id") ?>">ลบ</a>
                              </div>
                            </div>
                        </td>
                    </tr>
                <?php
            }
        }
    }