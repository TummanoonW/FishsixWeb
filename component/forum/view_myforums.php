<?php
    class MyForumsView{
        public static function initView($dir, $sess, $paths, $forums){
            $auth = $sess->getAuth();
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
                                        <h1 class="h2">บทความของฉัน</h1>
                                    </div>
                                    <div class="media-right">
                                        <div class="d-flex align-items-center mb-4">
                                            <a href="<?php Nav::echoURL($dir, App::$pageEditForum); ?>" class="btn btn-success">+ เขียนบทความ</a>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">ทั่วไป</h4>
                                            </div>
                                            <div class="media-right"></div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-fit">
                                        <?php self::initItems($dir, $forums) ?>
                                    </ul>
                                </div>
                            </div>
                            <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                
<?php
        }

        public static function initItems($dir, $forums){
            foreach($forums as $key => $value){
                if(isset($value->author)) $author = $value->author;  
                else $author = (object)array('username'=>'', 'profile_pic'=>'');   
?>
                <li class="list-group-item forum-thread">
                    <div class="media align-items-center">
                        <div class="media-left">
                            <div class="forum-icon-wrapper">
                                <a href="<?php Nav::echoURL($dir, App::$pageForumSingle . "?id=" . $value->ID ) ?>" class="forum-thread-icon">
                                    <i class="material-icons">description</i>
                                </a>
                                <a   class="forum-thread-user">
                                    <img src="<?php Asset::echoIcon($dir, $author->profile_pic)  ?>" alt="" width="20" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <a  class="text-body" href="<?php Nav::echoURL($dir, App::$pageForumSingle . "?id=" . $value->ID ) ?>"><strong> <?php echo $value->title; ?></strong></a>
                                <medium class="ml-auto text-muted"><?php echo $value->date; ?></medium>
                                <i class="material-icons pl-3 text-muted">arrow_drop_up</i></a>
                                <div class="media-right text-muted"><?php echo $value->upvote; ?></div>
                                <i class="material-icons pl-3 text-muted">arrow_drop_down</i></a>
                                <div class="media-right text-muted"><?php echo $value->downvote; ?></div>
                            </div>
                            <a class="text-black-70"><?php echo $author->username; ?></a>
                        </div>
                    </div>
                </li>
<?php       }
        }
    }