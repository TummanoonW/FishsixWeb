<?php
    class AdminAddCategoriesView{
        public static function initView($dir, $paths, $isNew, $category, $categories){
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

                                    <div class="media align-items-center mb-headings">
                                        <div class="media-body">
                                            <h1 class="h2">โปรแกรมแก้ไขหมวดหมู่</h1>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$routeAdminCategory . "?m=edit") ?>" method="POST" class="form-horizontal">
                                                    <?php if(!$isNew){ ?>
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-3 col-form-label form-label">ID</label>
                                                            <div class="col-sm-8">
                                                                <input name="ID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $category->ID; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label form-label">หัวเรื่อง</label>
                                                            <div class="col-sm-8">
                                                                <input name="title" type="text" id="title" class="form-control" placeholder="กรอกหัวเรื่อง" value="<?php if(!$isNew) echo $category->title; ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="parent" class="col-sm-3 col-form-label form-label">หมวดหมู่แม่</label>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <select name="parentID" id="masterID" class="form-control custom-select" style="width: 200px">
                                                                    <?php self::initSelect($dir, $isNew, $category->parentID, $categories) ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">บันทึก</button>
                                                                    <a onclick="confirmCancel('<?php Nav::echoURL($dir, App::$pageAdminManageCategories) ?>')" class="btn btn-danger text-light ml-2">ยกเลิก</a>
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
                        </div>
                        <?php Sidemenu::initSideMenu($dir) ?>
                    </div>
                </div>
            <?php Script::initScript($dir) ?> 

            
            
<?php
        }
        
        public static function initSelect($dir, $isNew, $parentID, $categories){
?>
            <option value="">-</option>
<?php
            foreach ($categories as $key => $value) {
                if($isNew){
?>
                    <option value="<?php echo $value->ID ?>"><?php echo $value->title ?></option>
<?php
                }else{
                    if($parentID != $value->ID){
?>  
                        <option value="<?php echo $value->ID ?>"><?php echo $value->title ?></option>
<?php   
                    }else{
?>  
                        <option value="<?php echo $value->ID ?>" selected><?php echo $value->title ?></option>    
<?php   
                    }
                }
            }
        }
    }
?>