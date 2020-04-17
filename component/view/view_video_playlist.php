<?php
    class VideoPlaylistView{
        public static function initView($dir, $sess, $paths, $category, $videos, $isAllowed){
            ?>
            	<body>
        <?php Toolbar::initToolbarSKRN($dir, '', $sess) ?>

		<main>
			<div class="flexslider progression-studios-dashboard-slider">
		      <ul class="slides">
					<li class="progression_studios_animate_left">
						<div class="progression-studios-slider-dashboard-image-background" style="background-image:url(<?php Asset::echoImage($dir, 'assets/images/wallpaper.jpg') ?>);">
							<div class="progression-studios-slider-display-table">
								<div class="progression-studios-slider-vertical-align">
								
									<div class="container">
										
										<div class="progression-studios-slider-dashboard-caption-width">
											<div class="progression-studios-slider-caption-align" style="background: rgb(255, 255, 255, 0.9); padding: 32px;">
											
												<h2><a href="#!">เพลย์ลิสต์ของ<?php echo $category->title  ?></a></h2>
												<br>
												<a class="btn btn-green-pro btn-slider-pro" href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $videos[0]->ID) ?>"><i class="fas fa-play"></i> เริ่มเล่น</a>
												<!--<div class="progression-studios-slider-more-options">
													<i class="fas fa-ellipsis-h"></i>
													<ul>
														<li><a href="#!">Add to Favorites</a></li>
														<li><a href="#!">Add to Watchlist</a></li>
														<li><a href="#!">Add to Playlist</a></li>
														<li><a href="#!">Share...</a></li>
														<li><a href="#!">Write A Review</a></li>
													</ul>
												</div>-->
												<div class="clearfix"></div>
												<br>
												<img src="<?php Asset::echoIcon($dir, '') ?>" alt="Starring" class="created-by-avatar">
												<h5 class="created-by-heading-pro text-dark">จัดทำโดย: ทีมงาน Fishsix</h5>
												<h6 class="created-by-heading-pro"><?php echo count($videos) ?> วิดีโอ</h6>


											</div><!-- close .progression-studios-slider-caption-align -->
										</div><!-- close .progression-studios-slider-caption-width -->
									
									</div><!-- close .container -->
								
								</div><!-- close .progression-studios-slider-vertical-align -->
							</div><!-- close .progression-studios-slider-display-table -->
						
							<div class="progression-studios-slider-mobile-background-cover-dark"></div>
						</div><!-- close .progression-studios-slider-image-background -->
					</li>				
				</ul>
			</div><!-- close .progression-studios-slider - See /js/script.js file for options -->

			
			
			<div class="dashboard-container">
				
				<ul class="dashboard-sub-menu">
					<li class="current"><a href="#!">เพลย์ลิสต์ของ<?php echo $category->title ?></a></li>
					
				</ul><!-- close .dashboard-sub-menu -->

				<div class="row">
					<?php self::initCardSKRN($dir , $videos)?>
					
				</div><!-- close .row -->
				
				<!--<ul class="page-numbers">
					<li><a class="previous page-numbers" href="#!"><i class="fas fa-chevron-left"></i></a></li>
					<li><span class="page-numbers current">1</span></li>
					<li><a class="page-numbers" href="#!">2</a></li>
					<li><a class="page-numbers" href="#!">3</a></li>
					<li><a class="page-numbers" href="#!">4</a></li>
					<li><a class="next page-numbers" href="#!"><i class="fas fa-chevron-right"></i></a></li>
				</ul>-->
				
						
			</div><!-- close .dashboard-container -->
		</main>
		
		
		</div><!-- close #sidebar-bg-->
        <?php Script::initScript($dir) ?>
                <?php Script::customScript($dir, 'common.js') ?>
            <?php
        }

        private static function initCardSKRN($dir, $videos){
            foreach ($videos as $key => $value) {
            ?>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
						<div class="item-playlist-container-skrn">
							<a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>"><img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" alt="Listing"></a>
							<div class="item-listing-text-skrn">
								<div class="item-listing-text-skrn-vertical-align"><h6><a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>"><?php echo $value->title ?></a></h6>
									<div>
								  		<span style="color:#42b740;"><i class="far fa-eye mr-2"></i><?php echo $value->views ?></span>
									</div>
								</div><!-- close .item-listing-text-skrn-vertical-align -->
							</div><!-- close .item-listing-text-skrn -->
						</div><!-- close .item-playlist-container-skrn -->
					</div>
            <?php    
            }
        }

        private static function initCard($dir, $videos){
            foreach ($videos as $key => $value) {
                ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="card bg-dark text-white" style="border: 1px solid black;">
                            <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>">
                                <img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg" class="card-img" alt="...">
                            </a>
                          <div class="card-body">
                            <h5 class="card-title text-muted"><?php echo $value->title ?></h5>
                            <a href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>" class="btn btn-primary"><i class="fas fa-play mr-2"></i>ดูวิดีโอ</a>

                            <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                          </div>
                        </div>
                    </div>
                <?php
            }
        }
    }

?>