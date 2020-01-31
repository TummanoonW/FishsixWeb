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
                   <li><a class="text-muted" href="<?php Nav::echoURL($dir, App::$pagePrivacy) ?>">นโยบายข้อมูลส่วนบุคคล</a></li>
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
    }
?>