<?php
    class ViewAbout{
        public static function initView($dir, $sess, $paths){
            ?>
                <body class="layout-fluid">
                    <link type="text/css" rel="stylesheet" href="<?php Nav::echoURL($dir, 'assets/css/lightgallery.min.css') ?>" /> 
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
                                        <div class="media-body">
                                            <h1 class="h2">เกี่ยวกับบริษัท</h1>
                                             <div>บริษัท พฤกษา โฮลดิ้ง จำกัด (มหาชน) (“บริษัทฯ”) จดทะเบียนก่อตั้งเป็นบริษัท มหาชน เมื่อวันที่ 16 มีนาคม 2559 เพื่อประกอบธุรกิจที่มีรายได้จากการถือหุ้นในบริษัทอื่นเป็นหลัก (Holding Company) ด้วยทุนจดทะเบียนเริ่มแรก 10,000 บาท ต่อมาที่ประชุมวิสามัญผู้ถือหุ้น ครั้งที่ 1/2559 ได้อนุมัติเพิ่มทุนจดทะเบียนของ บริษัทฯ จากเดิม 10,000 บาท เป็นทุนจดทะเบียนใหม่ 2,273,217,600 บาท โดยการออกหุ้นสามัญใหม่จำนวน 2,273,207,600 หุ้น มูลค่าที่ตราไว้หุ้นละ 1 บาท เพื่อรองรับการทำคำเสนอซื้อหลักทรัพย์ และการออกใบสำคัญแสดงสิทธิที่จะซื้อหุ้นสามัญของบริษัทฯ รวมถึงเพื่อให้สอดคล้องกับการเพิ่มทุนจดทะเบียนของบริษัทฯ และได้เข้าทำการซื้อขายในตลาดหลักทรัพย์แห่งประเทศไทย เป็นครั้งแรกในวันที่ 1 ธันวาคม 2559 ภายใต้สัญลักษณ์ “PSH”

บริษัทฯ มีธุรกิจหลักคือ ธุรกิจพัฒนาอสังหาริมทรัพย์เพื่อขาย โดย บริษัทฯ จะรักษาสัดส่วนในการประกอบธุรกิจพัฒนาอสังหาริมทรัพย์เพื่อขายซึ่งเป็นธุรกิจหลักให้มีสัดส่วนไม่น้อยกว่าร้อยละ 75 ของสินทรัพย์รวมของบริษัทฯ และภายหลังการปรับโครงสร้างแล้วเสร็จบริษัทฯ จะมีบริษัท พฤกษา เรียลเอสเตท จำกัด (มหาชน) เป็นบริษัทย่อยที่ประกอบธุรกิจหลัก และจะมีรายได้หลักจากเงินปันผลที่ได้รับจากการถือหุ้นใน บริษัท พฤกษา เรียลเอสเตท จำกัด (มหาชน) และบริษัทย่อย และ/หรือบริษัทร่วม ที่บริษัทฯ จะเข้าลงทุนในอนาคต

บริษัทฯ มีนโยบายเน้นการกระจายการลงทุนและหาโอกาสในการดำเนินธุรกิจใหม่ๆ เพิ่มเติมจากธุรกิจอสังหาริมทรัพย์เพื่อการอยู่อาศัย เพื่อการเติบโตที่ยั่งยืน และสามารถสร้างรายได้อย่างต่อเนื่อง (Recurring Income) จึงได้มีการอนุมัติการลงทุนในธุรกิจโรงพยาบาลและศูนย์บริการสุขภาพ โดยมีการดำเนินการผ่านบริษัทย่อย 2 บริษัท ได้แก่ (1) บริษัท โรงพยาบาลวิมุต โฮลดิ้ง จํากัด ซึ่งเป็นบริษัทที่ประกอบธุรกิจลงทุนในบริษัทอื่น และ (2) บริษัท โรงพยาบาลวิมุต อินเตอร์เนชั่นแนล จํากัด ซึ่งประกอบกิจการโรงพยาบาลเอกชน สถานพยาบาลและรักษาคนไข้ ปัจจุบันอยู่ระหว่างการก่อสร้าง คาดว่าจะสามารถเปิดให้บริการได้ในปี 2563 เป็นต้นไป ดังนั้น รายได้และผลการดำเนินการยังมาจากกลุ่มธุรกิจอสังหาริมทรัพย์เป็นหลัก</div>
                                         </div>
                                       
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <?php //Sidemenu::initSideMenu($dir, $sess) ?>
                            </div>
                   
                    <?php Script::initScript($dir) ?>
                                                        
            
                                                        
                    
            <?php
        }
    }