<?php
    class InfoPage{
        public static function initPage($dir, $msg){
            Header::initHeader($dir, "Info", TRUE, '', TRUE); //initialize HTML header elements with '<<someone name>> 's Profile' as Title
?>
            <div class="jumbotron bg-light padding-top">
              <h1 class="display-4"><i class="fas fa-info-circle"></i>&nbsp; Info</h1>
              <p class="lead"><?php echo $msg ?></p>
              <hr class="my-4">
              <a class="btn btn-primary btn-lg" href="<?php Nav::echoPrevious(); ?>" role="button"><i class="fas fa-arrow-left mr-2"></i>Go Back</a>
            </div>
<?php
            Footer::initFooter($dir, FALSE); //initialize HTML footer elements
        }
    }