<?php
    class ForumsView{
        public static function initView($dir, $sess, $paths, $pages, $forumTop, $forums){
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
                                        <h1 class="h2">บทความ</h1>
                                    </div>
                                    <div class="media-right">
                                        <div class="d-flex align-items-center mb-4">
                                            <a href="<?php Nav::echoURL($dir, App::$pageWriteForum); ?>" class="btn btn-success">เขียนบทความ</a>
                                        </div>
                                    </div>
                                </div>
                                 
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h4 class="card-title">ยอดนิยม</h4>
                                            </div>
                                            <div class="media-right"></div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-fit">
                                       <?php self::initItems($dir, $forumTop) ?>
                                    </ui>

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
                                            <?php self::initItems($forums) ?>
                                        </ul>
                                    </div>

                                    <!-- Pagination -->
                                    <?php Pagination::initPagination($dir, $pages) ?>
                                </div>
                            </div>
                            <?php Sidemenu::initSideMenu($dir, $sess) ?>
                        </div>
                    </div>
                </div>
                <?php Script::initScript($dir) ?>
                
<?php
        }

        public static function initItems($dir, $forums){
            foreach($forums as $key => $value){
                $topicUser = $topic->author; 
                $name = $topicUser->username;
                $pic = $topicUser->profile_pic;       
?>
                <li class="list-group-item forum-thread">
                    <div class="media align-items-center">
                        <div class="media-left">
                            <div class="forum-icon-wrapper">
                                <a href="<?php Nav::echoURL($dir, App::$pageForumSingle . "?id=" . $topic->ID ) ?>" class="forum-thread-icon">
                                    <i class="material-icons">description</i>
                                </a>
                                <a   class="forum-thread-user">
                                    <img src="<?php Asset::echoIcon($dir, $pic)  ?>" alt="" width="20" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <a  class="text-body"><strong> <?php if($name != null) echo $name; ?></strong></a>
                                <medium class="ml-auto text-muted"><?php echo $topic->date; ?></medium>
                                <i class="material-icons pl-3 text-muted">arrow_drop_up</i></a>
                                <div class="media-right text-muted"><?php echo $topic->upvote; ?></div>
                                <i class="material-icons pl-3 text-muted">arrow_drop_down</i></a>
                                <div class="media-right text-muted"><?php echo $topic->downvote; ?></div>
                                <?php Console::log("opic",$topic); ?>
                            </div>
                            <a class="text-black-70" href="<?php Nav::echoURL($dir, App::$pageForumSingle . "?id=" . $topic->ID ) ?> "><?php echo $topic->title; ?></a>
                        </div>
                    </div>
                </li>
<?php       }
        }
    }