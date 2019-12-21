<?php
    class FeedbackView{
        public static function initView($dir, $sess, $paths, $error_code){
            $auth = $sess->getAuth();

            if(isset($error_code)){
                $err = "&err=$error_code";
            }else{
                $err = NULL;
            }
?>
            <body class="layout-fluid">
                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <!-- Header -->
                    <?php Toolbar::initToolbar($dir, '', $sess) ?>
                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content" style="padding-top: 64px">

                    <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                        <div class="mdk-drawer-layout__content page ">
                            <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>
                                    
                                    <div class="media mb-headings align-items-center">
                                        <div class="media-body">
                                            <h1 class="h2">รายงานข้อผิดพลาด</h1>
                                        </div>
                                        <div class="media-right">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="container mt-5">
                                        <div class="card">
                                            <form class="card-body" action="<?php Nav::echoURL($dir, App::$routeFeedback . '?m=submit' . $err) ?>" method="POST">
                                                <div class="form-group">
                                                <label for="exampleInputEmail">อีเมล</label>
                                                    <?php if($sess->checkUserExisted()){ ?>
                                                        <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="โปรดระบุอีเมลของท่าน" value="<?php echo $auth->email; ?>" required="" readonly>
                                                    <?php }else{ ?>
                                                        <input name="email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="โปรดระบุอีเมลของท่าน" maxlength="50" value="" required>
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputTitle">หัวเรื่อง (ความยาวไม่เกิน 100 ตัวอักษร)</label>
                                                <input value="" type="text" name="title" class="form-control" id="exampleInputTitle" placeholder="โปรดระบุหัวเรื่อง" maxlength="100" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="exampleInputDescription">คำอธิบายประกอบ (ความยาวไม่เกิน 1000 ตัวอักษร)</label>
                                                <textarea name="description" class="form-control" id="exampleInputDescription" placeholder="แจ้งปัญหาที่คุณพบหรือความคิดเห็นใด ๆ ที่คุณต้องการแจ้งเรา" rows="6" maxlength="1000"></textarea>
                                                </div>
                                                <div class="form-group">
                                                 
                                                    <?php if($err != NULL){ ?>
                                                        <label for="exampleWarning">รหัสข้อผิดพลาด</label>
                                                        <input name="err" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="รหัสข้อผิดพลาด" value="<?php echo $error_code; ?>" required="" readonly>
                                                    <?php } ?>
                                                        
                                                </div>
                                                <button type="submit" class="btn btn-success">ส่ง</button>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                
<?php
        }
    }