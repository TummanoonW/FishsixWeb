<?php
    class Footer{ //footer elements loader

        public static function initFooter($dir){
?>
                <!-- Footer -->
<footer class="page-footer font-medium indigo bg-dark">

  <!-- Footer Links -->
  <div class="container text-center  p-4">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">
 

        <ul class="list-unstyled">
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageFeedback) ?>">รายงานข้อผิดพลาด</a>
          </li>
      
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
 

        <ul class="list-unstyled">
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageAbout) ?>">เกี่ยวกับบริษัท</a>
          </li>
   

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">
      <div class="col-md-2 mx-auto">

<!-- Links -->


<ul class="list-unstyled">
  <li>
  <a href="<?php Nav::echoURL($dir, App::$pageBranch) ?>">สาขาของเรา</a>
  </li>


</div>
<!-- Grid column -->

<hr class="clearfix w-100 d-md-none">
      <!-- Grid column -->
      <div class="col-md-1 mx-auto">

        <!-- Links -->
 

        <ul class="list-unstyled">
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageContact) ?>">ติดต่อเรา</a>
          </li>
    
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">
      <div class="col-md-2 mx-auto">

<!-- Links -->


      <ul class="list-unstyled">
       <li>
       <a href="<?php Nav::echoURL($dir, App::$pagePrivacy) ?>">นโยบายข้อมูลส่วนบุคคล</a>
      </li>

        </ul>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">
      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
 

        <ul class="list-unstyled">
 
         
 
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageTerm) ?>">ข้อตกลงและเงื่อนไข</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->
</footer>
                <!-- Bootstrap -->
                <script src="<?php Nav::echoURL($dir, 'assets/theme/bootstrap/js/bootstrap.min.js'); ?>"></script>
            </body>
            </html>
<?php
        }
    }
?>