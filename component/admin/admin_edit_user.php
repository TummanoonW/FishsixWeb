<?php
    class AdminAddUserView{

        public static function initView($dir, $sess, $paths, $isNew, $auth, $user){
?>
            <body class=" layout-fluid">
                <!-- Flatpickr -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr.rtl.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr-airbnb.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/flatpickr-airbnb.rtl.css') ?>" rel="stylesheet">

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir, '', $sess) ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <h1 class="h2">โปรแกรมแก้ไขผู้ใช้</h1>

                                    <div class="card">
                                        <ul class="nav nav-tabs nav-tabs-card">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#first" data-toggle="tab">บัญชีผู้ใช้</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$routeAdminUser . "?m=edit") ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                    <?php if(!$isNew){ ?>
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-3 col-form-label form-label">Auth ID</label>
                                                            <div class="col-sm-8">
                                                                <input name="authID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $auth->ID; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label form-label" for="type">ประเภท</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <?php 
                                                                        if(!$isNew){
                                                                            if($auth->isRoot){
?>
                                                                                <input name="type" type="text" id="type" class="form-control" placeholder="" value="<?php echo $auth->type; ?>" readonly>
<?php
                                                                            }else{
?>
                                                                                <select name="type" id="type" class="form-control custom-select">
                                                                                    <?php 
                                                                                        $u = 'selected';
                                                                                        $t = '';
                                                                                        $a = '';
                                                                                        $e = '';
                                                                                        switch($auth->type){
                                                                                            case 'admin':
                                                                                                $u = '';
                                                                                                $a = 'selected';
                                                                                                break;
                                                                                            case 'teacher':
                                                                                                $u = '';
                                                                                                $t = 'selected';
                                                                                                break;
                                                                                            case 'editor':
                                                                                                $u = '';
                                                                                                $e = 'selected';
                                                                                                break;
                                                                                            default:
                                                                                                $u = 'selected';
                                                                                                break;
                                                                                        }
                                                                                    ?>
                                                                                     <option value="user" <?php echo $u ?>>ผู้ใช้ทั่วไป</option>
                                                                                     <option value="teacher" <?php echo $t ?>>ครู</option>
                                                                                     <option value="editor" <?php echo $a ?>>แอดมิน</option>
                                                                                     <option value="admin" <?php echo $a ?>>ซุเปอร์แอดมิน</option>
                                                                                 </select>
<?php
                                                                            }
                                                                        }else{
?>
                                                                                <select name="type" id="type" class="form-control custom-select">
                                                                                     <option value="user" selected>ผู้ใช้ทั่วไป</option>
                                                                                     <option value="teacher">ครู</option>
                                                                                     <option value="editor">แอดมิน</option>
                                                                                     <option value="admin">ซุเปอร์แอดมิน</option>
                                                                                 </select>
<?php
                                                                        } 
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                            <label for="email" class="col-sm-3 col-form-label form-label">อีเมล</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="material-icons md-18 text-muted">mail</i>
                                                                        </div>
                                                                    </div>
                                                                <input name="email" type="text" id="email" class="form-control" placeholder="Email Address" value="<?php if(!$isNew) echo $auth->email ?>" required="" <?php if(!$isNew) echo 'readonly'?>>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="username" class="col-sm-3 col-form-label form-label">ชื่อผู้ใช้</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="username" id="username" type="text" class="form-control" placeholder="กรอกชื่อผู้ใช้" value="<?php if(!$isNew) echo $auth->username ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="avatar" class="col-sm-3 col-form-label form-label">ภาพโปรไฟล์</label>
                                                        <div class="col-sm-9">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <div class="icon-block rounded-circle bg-transparent">
                                                                        <img id="prof" class="w-100 h-auto" src="<?php if(!$isNew) Asset::echoIcon($dir, $auth->profile_pic) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="custom-file" style="width: auto;">
                                                                        <input name="profile_pic" type="file" id="avatar" class="custom-file-input" accept="image/*" value="<?php if(!$isNew) echo $auth->profile_pic ?>" onchange="uploadToPicture(this, 128, 128, '#prof', '#profile_pic2')">
                                                                        <label for="avatar" class="custom-file-label">อัพโหลดไฟล์</label>
                                                                        <small class="text-secondary">ขนาดที่แนะนำ: 128x128 px</small>
                                                                    </div>
                                                                    <!-- <input name="profile_pic2" id="profile_pic2" style="visibility: collapse; height: 1px;" value="<?php if(!$isNew) echo $auth->profile_pic ?>"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input name="isRoot" type="text" id="isroot" class="form-control" style="visibility: collapse;" placeholder="" value="<?php if(!$isNew) echo $auth->isRoot; ?>" readonly>
                                                    <hr>

                                                    <?php if(!$isNew){ ?>
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-3 col-form-label form-label">ID ผู้ใช้</label>
                                                            <div class="col-sm-8">
                                                                <input name="ID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $user->ID; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 col-form-label form-label">ชื่อจริง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="fname" id="fname" type="text" class="form-control" placeholder="กรอกชื่อจริง" value="<?php if(!$isNew) echo $user->fname ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 col-form-label form-label">นามสกุล</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lname" id="lname" type="text" class="form-control" placeholder="กรอกนามสกุล" value="<?php if(!$isNew) echo $user->lname ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Flatpickr -->
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="bdate">วันเกิด:</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="bdate" id="bdate" type="hidden" class="form-control flatpickr-input" data-toggle="flatpickr" value="<?php if(!$isNew) echo $user->bdate ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label form-label" for="gender">เพศ</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                 <select name="gender" id="gender" class="form-control custom-select">
                                                                    <?php 
                                                                        $x = 'selected';
                                                                        $m = '';
                                                                        $f = '';
                                                                        if(!$isNew){
                                                                            switch($user->gender){
                                                                                case 'male':
                                                                                    $x = '';
                                                                                    $m = 'selected';
                                                                                    break;
                                                                                case 'female':
                                                                                    $x = '';
                                                                                    $f = 'selected';
                                                                                    break;
                                                                                default:
                                                                                    $x = 'selected';
                                                                                    break;
                                                                            }
                                                                        }
                                                                    ?>
                                                                     <option value="" <?php echo $x ?>>-</option>
                                                                     <option value="male" <?php echo $m ?>>ชาย</option>
                                                                     <option value="female" <?php echo $f ?>>หญิง</option>
                                                                 </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="address">ที่อยู่</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="address" id="address"  type="text" class="form-control" placeholder="กรอกที่อยู่" value="<?php if(!$isNew) echo $user->address ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- jQuery Mask Plugin -->
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="phone">เบอร์โทรศัพท์</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                <input name="phone" id="phone" type="text" class="form-control" placeholder="123-456-7890" data-mask="000-000-0000" autocomplete="off" maxlength="12" value="<?php if(!$isNew) echo $user->phone ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="facebook" class="col-sm-3 col-form-label form-label">Facebook</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="facebookURL" id="facebook" type="url" class="form-control" placeholder="กรอกชื่อ หรือ URL Facebook" value="<?php if(!$isNew) echo $user->facebookURL ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lineid" class="col-sm-3 col-form-label form-label">id ไลน์</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lineID" id="lineid" type="text" class="form-control" placeholder="กรอก id ไลน์" value="<?php if(!$isNew) echo $user->lineID ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="guardian" class="col-sm-3 col-form-label form-label">ชื่อผู้ปกครอง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="guardian" id="guardian" type="text" class="form-control" placeholder="กรอกชื่อผู้ปกครองของคุณ" value="<?php if(!$isNew) echo $user->guardian ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="guardianPhone" class="col-sm-3 col-form-label form-label">เบอร์โทรผู้ปกครอง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="guardianPhone" id="guardianPhone" type="tel" class="form-control" placeholder="กรอกเบอร์โทรผู้ปกครอง" value="<?php if(!$isNew) echo $user->guardianPhone ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="school" class="col-sm-3 col-form-label form-label">โรงเรียนที่เรียน</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="school" id="school" type="text" class="form-control" placeholder="กรอกโรงเรียนที่คุณเรียน" value="<?php if(!$isNew) echo $user->school ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            
                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">บันทึก</button>
                                                                    <a onclick="confirmCancel('<?php Nav::echoURL($dir, App::$pageAdminManageUser) ?>')" class="btn btn-danger text-light ml-2">ยกเลิก</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                            
                            
                        </div>
                    </div>
                </div>
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::initScript($dir) ?>
                <!-- Flatpickr -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/flatpickr/flatpickr.min.js')?>"></script>
                <script src="<?php Nav::echoURL($dir, 'assets/js/flatpickr.js')?>"></script>
                <!-- jQuery Mask Plugin -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/jquery.mask.min.js')?>"></script>
                    
<?php
        }

    }