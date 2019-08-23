<?php
    class AdminAddBranchView{

        public static function initView($dir, $paths, $isNew, $branch){
            $auth = Session::getAuth();
?>
            <body class=" layout-fluid">
               

                <!-- Pre Loader -->
                <?php Preloader::initPreloader($dir) ?>

                <!-- Header Layout -->
                <div class="mdk-header-layout js-mdk-header-layout">

                    <?php Toolbar::initToolbar($dir) ?>

                    <!-- // END Header -->

                    <!-- Header Layout Content -->
                    <div class="mdk-header-layout__content">

                        <div data-push data-responsive-width="992px" class="mdk-drawer-layout js-mdk-drawer-layout">
                            <div class="mdk-drawer-layout__content page ">

                                <div class="container-fluid page__container">

                                    <!-- Navigation Paths -->
                                    <?php Breadcrumb::initBreadcrumb($dir, $paths) ?>

                                    <h1 class="h2">Branch Editor</h1>

                                    <div class="card">
                                        <div class="tab-content card-body">
                                            <div class="tab-pane active" id="first">
                                                <form action="<?php Nav::echoURL($dir, App::$routeAdminBranch . "?m=edit") ?>" method="POST" class="form-horizontal">
                                                    <?php if(!$isNew){ ?>
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-3 col-form-label form-label">ID</label>
                                                            <div class="col-sm-8">
                                                                <input name="ID" type="text" id="id" class="form-control" placeholder="" value="<?php if(!$isNew) echo $branch->ID; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <div class="form-group row">
                                                            <label for="title" class="col-sm-3 col-form-label form-label">Title</label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                <input name="title" type="text" id="title" class="form-control" placeholder="Enter title" value="<?php if(!$isNew) echo $branch->title ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="description" class="col-sm-3 col-form-label form-label">Description</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea name="description" id="description" rows="4" type="text" class="form-control" placeholder="Enter description" value="<?php if(!$isNew) echo $branch->description ?>"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="picture" class="col-sm-3 col-form-label form-label">Thumbnail</label>
                                                        <div class="col-sm-9">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <div class="rounded bg-transparent">
                                                                        <?php if($isNew){ ?>
                                                                            <img id="thumb" class="w-100 h-auto" src="<?php Asset::echoThumb($dir, '') ?>">
                                                                        <?php }else{ ?>
                                                                            <img id="thumb" class="w-100 h-auto" src="<?php if(!$isNew) echo $branch->thumbnail ?>">
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="media-right">
                                                                    <div class="custom-file" style="width: auto;">
                                                                        <input type="file" id="picture" class="custom-file-input" accept="image/*" onchange="urlToBase64(this, 720, 480, '#thumb', '#thumbnail')">
                                                                        <label for="picture" class="custom-file-label">Choose file</label>
                                                                        <small class="text-secondary">recommended size: 720x480 px</small>
                                                                    </div>
                                                                </div>
                                                                <input name="thumbnail" id="thumbnail" style="visibility: collapse;" value="<?php if(!$isNew) echo $branch->thumbnail ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="address" class="col-sm-3 col-form-label form-label">Address</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <textarea name="address" id="address" type="text" class="form-control" placeholder="Enter address"><?php if(!$isNew) echo $branch->address ?></textarea>                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="location" class="col-sm-3 col-form-label form-label">Map Location</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="location" id="location" type="text" class="form-control" placeholder="Enter Google Map location" value="<?php if(!$isNew) echo $branch->location ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nearbyPlace" class="col-sm-3 col-form-label form-label">Nearby Place</label>
                                                        <div class="col-sm-8">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input name="nearbyPlace" id="nearbyPlace" type="text" class="form-control" placeholder="Enter nearby place" value="<?php if(!$isNew) echo $branch->nearbyPlace ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-8 offset-sm-3">
                                                            <div class="media align-items-center">
                                                                <div class="media-left">
                                                                    <button type="submit" class="btn btn-success">Save</button>
                                                                    <a onclick="confirmCancel('<?php Nav::echoURL($dir, App::$pageAdminManageBranch) ?>')" class="btn btn-danger text-light ml-2">Cancel</a>
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
                            <?php Sidemenu::initSideMenu($dir) ?>
                            <!-- Custom Script -->
                            <?php Script::customScript($dir, 'common.js') ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                    
<?php
        }

    }