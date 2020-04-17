<?php
    class VideoView{
        public static function initView($dir, $sess, $paths, $category, $video, $isAllowed, $videos){
            ?>
            	<body>
		<div>	
            <?php Toolbar::initToolbarSKRN($dir, '', $sess) ?>
		    <main>
			
			<div id="movie-detail-header-pro" style="height: 60vh; background-image:url('https://i1.ytimg.com/vi/<?php echo $video->youtube_id ?>/mqdefault.jpg')">
				
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
				
				<a class="movie-detail-header-play-btn afterglow" href="#VideoLightbox-1"><i class="fas fa-play mt-4"></i></a>
				
	         <video id="VideoLightbox-1" data-youtube-id="<?php echo $video->youtube_id ?>"  poster="https://i1.ytimg.com/vi/<?php echo $video->youtube_id ?>/mqdefault.jpg" width="960" height="540"></video>
				
				<div id="movie-detail-header-media">
					<div class="dashboard-container">
						<h5>บทเรียนต่อไป</h5>						
						<div class="row">
							<?php self::initCardSKRN($dir, $videos, $video) ?>
						</div><!-- close .row -->
					</div><!-- close .dashboard-container -->
				</div><!-- close #movie-detail-header-media -->
				
				<div id="movie-detail-gradient-pro"></div>
			</div><!-- close #movie-detail-header-pro -->

			    <div class="dashboard-container mt-4">
				    <div class="movie-details-section">
				    	<h2><?php echo $video->title ?></h2>
				    	<p><?php echo $video->content ?></p>
				    </div><!-- close .movie-details-section -->
			    </div><!-- close .dashboard-container -->
		    </main>
		
		
		</div>
        <?php Script::initScript($dir) ?>
                <?php Script::customScript($dir, 'common.js') ?>
        <?php
        }

        private static function initCardSKRN($dir, $videos, $video){
			$count = 0;
			$start = FALSE;
			$repeat = FALSE;
            foreach ($videos as $key => $value) {
				if($start == TRUE){
					if($key != count($videos)-1){
                		if($count < 3){
            				?>
            					<div class="col-6 col-md-4 col-lg-4">
									<a class="movie-detail-media-link afterglow" href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $value->ID) ?>">
										<div class="movie-detail-media-image">
											<img src="https://i1.ytimg.com/vi/<?php echo $value->youtube_id ?>/mqdefault.jpg">
											<span><i class="fas fa-play mt-2 text-light"></i></span>
											<h6><?php echo $value->title ?></h6>
										</div>
									</a>
								</div>
            				<?php
							$count = $count + 1;
						}
					}else{
						$repeat = TRUE;
					}
				}

				if($value->ID == $video->ID) $start = TRUE;
			}
			
			if($repeat == TRUE){
				switch($count){
					case 0: $loop = 3; break;
					case 1: $loop = 2; break;
					case 2: $loop = 1; break;
					default: $loop = 0;
				}

				for ($i=0; $i < $loop; $i++) { 
					?>
						<div class="col-6 col-md-4 col-lg-4">
							<a class="movie-detail-media-link afterglow" href="<?php Nav::echoURL($dir, App::$pageVideoView . "?id=" . $videos[$i]->ID) ?>">
								<div class="movie-detail-media-image">
									<img src="https://i1.ytimg.com/vi/<?php echo $videos[$i]->youtube_id ?>/mqdefault.jpg">
									<span><i class="fas fa-play mt-2 text-light"></i></span>
									<h6><?php echo $videos[$i]->title ?></h6>
								</div>
							</a>
						</div>
					<?php
				}
			}

			Console::log('val', "c: $count | s: $start | r: $repeat | l: $loop");
        }

        
    }

?>