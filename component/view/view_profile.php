<?php
    class ProfileView{ ////profile HTML elements loader

        public static function initView($dir, $sess, $paths, $auth, $user){
?>
            <body class=" layout-fluid">
                <!-- Flatpickr -->
                <link type="text/css" href="assets/css/flatpickr.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr.rtl.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr-airbnb.css" rel="stylesheet">
                <link type="text/css" href="assets/css/flatpickr-airbnb.rtl.css" rel="stylesheet">

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

                                    <h1 class="h2">แก้ไขข้อมูลโปรไฟล์</h1>

                                    <div class="card">
                                        <ul class="nav nav-tabs nav-tabs-card">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#first" data-toggle="tab">บัญชีผู้ใช้</a>
                                            </li>
                                            <!--<li class="nav-item">
                                                <a class="nav-link" href="#second" data-toggle="tab">การเก็บใบเสร็จ</a>
                                            </li>-->
                                        </ul>
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$routeProfile . "?id=" . $auth->ID) ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">

                                                    <div class="form-group row">
                                                            <label for="email" class="col-sm-3 col-form-label form-label">อีเมล</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="material-icons md-18 text-muted">mail</i>
                                                                        </div>
                                                                    </div>
                                                                <input name="email" type="text" id="email" class="form-control" placeholder="กรอกอีเมล ของคุณ" value="<?php echo $auth->email ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="username" class="col-sm-3 col-form-label form-label">ชื่อผู้ใช้ (ชื่อเล่น)</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="username" id="username" type="text" class="form-control" placeholder="กรอกชื่อผู้ใช้ ของคุณ" value="<?php echo $auth->username ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="avatar" class="col-sm-3 col-form-label form-label">ภาพโปรไฟล์</label>
                                                        <div class="col-sm-9">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <div class="icon-block rounded bg-transparent">
                                                                        <img id="prof" class="w-100 h-100" src="<?php Asset::echoIcon($dir, $auth->profile_pic) ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="custom-file" style="width: auto;">
                                                                        <input name="profile_pic" type="file" id="avatar" class="custom-file-input" accept="image/*" onchange="uploadToPicture(this, 128, 128, '#prof', '#profile_pic2')" value="<?php echo $auth->profile_pic ?>">
                                                                        <label for="avatar" class="custom-file-label">อัพโหลดไฟล์</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input name="profile_pic2" id="profile_pic2" style="visibility: collapse;" value="<?php echo $auth->profile_pic ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="fname" class="col-sm-3 col-form-label form-label">ชื่อจริง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="fname" id="fname" type="text" class="form-control" placeholder="กรอกชื่อจริง ของคุณ" value="<?php if(isset($user->fname))echo $user->fname ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lname" class="col-sm-3 col-form-label form-label">นามสกุล</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lname" id="lname" type="text" class="form-control" placeholder="กรอกนามสกุล ของคุณ" value="<?php if(isset($user->lname))echo $user->lname ?>">
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
                                                                    <input name="bdate" id="bdate" type="hidden" class="form-control flatpickr-input" data-toggle="flatpickr" value="<?php if(isset($user->bdate))echo $user->bdate ?>">
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
                                                                        switch($user->gender){ 
                                                                            case 'male':
                                                                            ?>
                                                                                <option>-</option>
                                                                                <option value="male" selected>ชาย</option>
                                                                                <option value="female">หญิง</option>
                                                                            <?php
                                                                                break;
                                                                            case 'female':
                                                                            ?>
                                                                                <option>-</option>
                                                                                <option value="male">ชาย</option>
                                                                                <option value="female" selected>หญิง</option>
                                                                            <?php
                                                                                break;
                                                                            default:
                                                                            ?>
                                                                                <option selected>-</option>
                                                                                <option value="male">ชาย</option>
                                                                                <option value="female">หญิง</option>
                                                                            <?php
                                                                                break;
                                                                        }
                                                                    ?>
                                                                 </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label form-label" for="address">ที่อยู่ปัจจุบัน</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="address" id="address"  type="text" required="" class="form-control" placeholder="Your address" value="<?php if(isset($user->address))echo $user->address ?>">
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
                                                                <input name="phone" id="phone" type="text" class="form-control" placeholder="123-456-7890" data-mask="000-000-0000" autocomplete="off" maxlength="12" value="<?php if(isset($user->phone))echo $user->phone ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="facebook" class="col-sm-3 col-form-label form-label">ชื่อ Facebook</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="facebookURL" id="facebook" type="url" class="form-control" placeholder="กรอกชื่อ หรือ URL Facebook ของคุณ" value="<?php if(isset($user->facebookURL))echo $user->facebookURL ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="lineid" class="col-sm-3 col-form-label form-label">id ไลน์</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="lineID" id="lineid" type="text" class="form-control" placeholder="กรอก id ไลน์ ของคุณ" value="<?php if(isset($user->lineID))echo $user->lineID ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="guardian" class="col-sm-3 col-form-label form-label">ชื่อผู้ปกครอง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="guardian" id="guardian" type="text" class="form-control" placeholder="กรอกชื่อผู้ปกครองของคุณ" value="<?php if(isset($user->guardian))echo $user->guardian ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="guardianPhone" class="col-sm-3 col-form-label form-label">เบอร์โทรผู้ปกครอง</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="guardianPhone" id="guardianPhone" type="tel" class="form-control" placeholder="กรอกเบอร์โทรผู้ปกครอง" value="<?php if(isset($user->guardianPhone))echo $user->guardianPhone ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="school" class="col-sm-3 col-form-label form-label">โรงเรียนที่เรียน</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="school" id="school" type="text" class="form-control" placeholder="กรอกโรงเรียนที่คุณเรียน" value="<?php if(isset($user->school))echo $user->school ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="education" class="col-sm-3 col-form-label form-label">ระดับชั้นเรียน</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="education" id="education" type="text" class="form-control" placeholder="กรอกระดับชั้นเรียน" value="<?php if(isset($user->education))echo $user->education ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="howyouknowus" class="col-sm-3 col-form-label form-label">รู้จักเราจากช่องทางไหน:</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="howyouknowus" id="howyouknowus" type="text" class="form-control" placeholder="กรอกคำตอบ" value="<?php if(isset($user->howyouknowus))echo $user->howyouknowus ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="whychooseus" class="col-sm-3 col-form-label form-label">ทำไมถึงเลือกเรียนกับเรา:</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="whychooseus" id="whychooseus" type="text" class="form-control" placeholder="กรอกคำตอบ" value="<?php if(isset($user->whychooseus))echo $user->whychooseus ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    
                                                    <h4>ขั้นสูง</h4>
                                                    <div class="form-group row">
                                                        <label for="newpassword" class="col-sm-3 col-form-label form-label">ตั้งรหัสผ่านใหม่ (ไม่ต่ำกว่า 6 ตัวอักษร)</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="newpassword" id="newpassword" type="password" class="form-control" placeholder="กรอกรหัสผ่านใหม่ของคุณ" minlenght="6" maxlenght="12">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <input name="authID" id="authID" type="text" class="form-control" value="<?php echo $user->authID ?>" style="visibility: collapse; height: 0px;">

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">บันทึก การเปลี่ยนแปลง</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                                <form action="<?php Nav::echoURL($dir, App::$routeLogOut); ?>" method="POST" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-danger">ออกจากระบบ</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                            <!--<div class="tab-pane" id="second">
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label for="name_on_invoice" class="col-sm-3 col-form-label form-label">Name on Invoice</label>
                                                        <div class="col-sm-6 col-md-4">
                                                            <input id="name_on_invoice" type="text" class="form-control" value="Adrian Demian">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="billing_address" class="col-sm-3 col-form-label form-label">Address</label>
                                                        <div class="col-sm-6 col-md-4">
                                                            <input id="billing_address" type="text" class="form-control" value="Sunny Street, 21, Miami, Florida">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="billing_country" class="col-sm-3 col-form-label form-label">Country</label>
                                                        <div class="col-sm-6 col-md-4">
                                                            <select id="billing_country" class="custom-control custom-select form-control">
                                                                <option value="1" selected>USA</option>
                                                                <option value="2">India</option>
                                                                <option value="3">United Kingdom</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 col-md-4 offset-sm-3">
                                                            <a href="#" class="btn btn-success"> Update Billing</a>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="card mt-2">
                                                    <div class="card-header">
                                                        <div class="media align-items-center">
                                                            <div class="media-body">
                                                                <h4 class="card-title">Payment Info</h4>
                                                            </div>
                                                            <div class="media-right">
                                                                <a href="#" class="btn btn-sm btn-outline-primary"><i class="material-icons">add</i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <ul class="card-footer p-0 list-group list-group-fit">
                                                        <li class="list-group-item active">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <span class="btn btn-primary btn-circle"><i class="material-icons">credit_card</i></span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <p class="mb-0">**** **** **** 2422</p>
                                                                    <small>Updated on 12/02/2016</small>
                                                                </div>
                                                                <div class="media-right">
                                                                    <a href="#" class="btn btn-primary btn-sm">
                                                                        <i class="material-icons btn__icon--left">edit</i> EDIT
                                                                    </a>
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
                                                                    <a href="#" class="btn btn-white btn-sm">
                                                                        <i class="material-icons btn__icon--left">edit</i> EDIT
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->
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
                <script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
                <script src="assets/js/flatpickr.js"></script>
                <!-- jQuery Mask Plugin -->
                <script src="assets/vendor/jquery.mask.min.js"></script>
                
                
<?php
        }

    }