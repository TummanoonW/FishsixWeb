<?php
    class Footer{ //footer elements loader

        public static function initFooter($dir){
?>
                <!-- Footer -->
<footer class="page-footer font-medium indigo bg-dark">

  <!-- Footer Links -->
  <div class="container text-center  p-3">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">
 

        <ul class="list-unstyled">
          <li>
            <a href="<?php Nav::echoURL($dir, App::$pageLogin) ?>">เข้าสู่ระบบ</a>
          </li>
          <li>
            <a href="<?php Nav::echoURL($dir, App::$pageRegister) ?>">สมัคสมาชิก</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageProfile) ?>">โปรไฟล์ของฉัน</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageMyCourses) ?>">คอร์สเรียนของฉัน</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
 

        <ul class="list-unstyled">
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageCourses) ?>">ค้นหาคอร์สเรียน</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageMyCart )?>">ตะกร้าคอร์สเรียนของฉัน</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageBookClass) ?>">จองรอบเรียน</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageMySchedule) ?>">ตารางเรียน</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
 

        <ul class="list-unstyled">
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageViewBooking) ?>">ดูข้อมูลการจอง</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageViewBranch) ?>">ดูข้อมูลสาขา</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageOrderCourses) ?>">สั่งซื้อคอร์สเรียน</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageMyOrders) ?>">ดูคำสั่งซื้อของฉัน</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
 

        <ul class="list-unstyled">
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageFeedback) ?>">รายงานข้อผิดพลาด</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageAbout) ?>">เกี่ยวกับบริษัท</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pageContact) ?>">ติดต่อเรา</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pagePrivacy) ?>">นโยบายข้อมูลส่วนบุคคล</a>
          </li>
          <li>
          <a href="<?php Nav::echoURL($dir, App::$pagePrivacy) ?>">ข้อตกลงและเงื่อนไข</a>
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