<?php
    class Footer{ //footer elements loader

        public static function initFooter($dir){
          $sess = new Sess();
?>
          <footer class="page-footer font-medium indigo bg-dark">
            <div class="text-center  p-4">
              <div class="row">
                <div class="col-md-2 mx-auto">
                  <ul class="list-unstyled">
                    <li><a class="text-muted" href="<?php Nav::echoURL($dir, App::$pageReview) ?>">ตัวอย่างการสอน และรีวิว</a></li>
                  </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-2 mx-auto">
                  <ul class="list-unstyled">
                    <li><a class="text-muted" href="<?php Nav::echoURL($dir, App::$pageTutor) ?>">ผู้สอน</a></li>
                  </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-2 mx-auto">
                  <ul class="list-unstyled">
                   <li><a class="text-muted" href="<?php Nav::echoURL($dir, App::$pageForums) ?>">บทความ</a></li>
                  </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-2 mx-auto">
                  <ul class="list-unstyled">
                    <li>
                    <a class="text-muted" href="<?php Nav::echoURL($dir, App::$pageTerm) ?>">ข้อตกลงและเงื่อนไข</a>
                    </li>
                  </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-3 mx-auto">
                  <ul class="list-unstyled">
                    <li>
                    <a class="text-muted" href="<?php Nav::echoURL($dir, App::$pageFeedback) ?>">รายงานข้อผิดพลาด</a>
                    </li>
                  </ul>
                </div>
                <hr class="clearfix w-100 d-md-none">
                <div class="col-md-1 mx-auto">
                  <ul class="list-unstyled">
                    <li><a class="text-muted" href="<?php Nav::echoURL($dir, App::$pageContact) ?>">ติดต่อเรา</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div>
              <div class="">
                <div class="pr-5">
                  <div class="row d-flex align-items-center">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                      <div class="text-right text-muted">
                        <p>© 2019 FISHSIX คณิตศาสตร์ ฟิสิกส์ สอนสด. All rights reserved.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </footer>

          <div class="feet bg-light">
            <div style="
                width: 100%;
                height: 1px;
                background: lightgray;
            "></div>
              <?php LayoutMenu::initLayoutMenu($dir, $sess) ?>
          </div>
          <!-- Bootstrap -->
          <script src="<?php Nav::echoURL($dir, 'assets/theme/bootstrap/js/bootstrap.min.js'); ?>"></script>

          <!-- Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js"></script>
        </body>
      </html>
<?php
        }

        public static function initFooterSKRN($dir){
          $sess = new Sess();
?>

         <div class="feet bg-light">
            <div style="
                width: 100%;
                height: 1px;
                background: lightgray;
            "></div>
              <?php LayoutMenu::initLayoutMenuSKRN($dir, $sess) ?>
          </div>
         <!-- Bootstrap -->
         <script src="<?php Nav::echoURL($dir, 'assets/theme/bootstrap/js/bootstrap.min.js'); ?>"></script>

		      <!-- Required Framework JavaScript -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/libs/jquery-3.3.1.min.js') ?>"></script><!-- jQuery -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/libs/popper.min.js') ?>" defer></script><!-- Bootstrap Popper/Extras JS -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/libs/bootstrap.min.js') ?>" defer></script><!-- Bootstrap Main JS -->
		      <!-- All JavaScript in Footer -->

		      <!-- Additional Plugins and JavaScript -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/navigation.js') ?>" defer></script><!-- Header Navigation JS Plugin -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/jquery.flexslider-min.js') ?>" defer></script><!-- FlexSlider JS Plugin -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/jquery-asRange.min.js') ?>" defer></script><!-- Range Slider JS Plugin -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/circle-progress.min.js') ?>" defer></script><!-- Circle Progress JS Plugin -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/afterglow.min.js') ?>" defer></script><!-- Video Player JS Plugin -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/script.js') ?>" defer></script><!-- Custom Document Ready JS -->
		      <script src="<?php Nav::echoURL($dir, 'assets/js/skrn/script-dashboard.js') ?>" defer></script><!-- Custom Document Ready for Dashboard Only JS -->

          <!-- Google Analytics -->
          <script async src="https://www.googletagmanager.com/gtag/js"></script>
        </body>
      </html>
<?php
        }
    }
?>