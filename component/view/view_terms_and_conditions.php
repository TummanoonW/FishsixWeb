<?php
    class ViewTerm{
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
                                            
                                            <div class="container">
            <div class="col-md-10 offset-md-1">
            <h1 class="h2">ข้อตกลงและเงื่อนไข</h1>
                <p>ข้อกำหนดการใช้งานเหล่านี้ (รวมถึงเอกสารที่อ้างถึงในเอกสารเหล่านี้)
                    จะบอกถึงข้อกำหนดในการให้บริการที่คุณใช้งานหรือเข้าใ้ช้บริการใน www.starfishlabz.com
                    โดเมนย่อยหรือเว็บไซต์ที่เกี่ยวข้องและ/หรือแอปพลิเคชันบนอุปกรณ์เคลื่อนที่สำหรับเว็บไซต์ดังกล่าว
                    ("เว็บไซต์"ของเรา) ไม่ว่าจะเป็นผู้เข้าชมหรือผู้ใช้ที่ลงทะเบียนการใช้งานบนเว็บไซต์ของเรา รวมถึงการใช้งาน
                    การเข้าชม การลงทะเบียนบัญชี และการทำกิจกรรมต่างๆ
                    คุณจะต้องปฎิบัติตามข้อกำหนดเหล่านี้เมื่อเข้าสู่เว็บไซต์ของเรา
                </p>

                <p>รุณาอ่านและยอมรับข้อกำหนดในการให้บริการเหล่านี้อย่างรอบคอบ ก่อนใช้งานเว็บไซต์ของเรา
                    เนื่องจากข้อกำหนดเหล่านี้จะมีผลต่อการใช้งานเว็บไซต์ของเรา</p>

                <p>เราขอแนะนำให้คุณพิมพ์สำเนาข้อกำหนดเพื่อใช้อ้างอิงในอนาคต เมื่อใช้เว็บไซต์ของเรา
                    คุณยืนยันว่าคุณยอมรับข้อกำหนดและยอมรับว่าคุณปฏิบัติตามข้อกำหนดดังกล่าว</p>

                <p>หากคุณไม่ยอมรับข้อกำหนดในการให้บริการเหล่านี้คุณจะต้องไม่ใช้งานหรือบริการในเว็บไซต์ของเรา</p>

                <h2 class="h4">1. ข้อกำหนดที่เกี่ยวข้องอื่นๆ</h2>
                <p>ข้อกำหนดการใช้งานเหล่านี้อ้างถึงข้อกำหนดเพิ่มเติมดังต่อไปนี้ ซึ่งรวมไปถึงการใช้งานบนเว็บไซต์ของเรา:
                    นโยบายความเป็นส่วนตัวของเรา ซึ่งกำหนดเงื่อนไขที่เราดำเนินการข้อมูลส่วนบุคคลที่เราเก็บรวบรวมจากคุณ
                    หรือที่คุณให้ไว้กับเรา</p>

                <h2 class="h4">2. ข้อมูลเกี่ยวกับเรา</h2>
                <p>เว็บไซต์ของเราดำเนินการโดย Starfish Education Foundation ("เรา" หรือ "starfishlabz.com")</p>

                <h2 class="h4">3. การเข้าใช้งานเว็บไซต์ของเรา</h2>
                <p>เว็บไซต์ของเราให้บริการโดยไม่เรียกเก็บค่าใช้จ่ายในการใช้งาน โดยมุ่งหวังที่จะเผยแพร่ ส่งเสริมการเรียนรู้
                    และพัฒนาทักษะการเรียนการสอนให้แก่นักการศึกษา หรือ ผู้ใช้งานเว็บไซต์ของเรา</p>

                <h2 class="h4">4. บัญชีและรหัสผ่านของคุณ</h2>
                <p>ในการลงทะเบียนสำหรับบัญชีผู้ใช้บนเว็บไซต์ของเราคุณต้องมีอายุ 18 ปีขึ้นไปในการลงทะเบียน
                    หากคุณเลือกหรือได้รับรหัสประจำตัวผู้ใช้ รหัสผ่าน
                    หรือข้อมูลอื่นใดที่เป็นส่วนหนึ่งของขั้นตอนการรักษาความปลอดภัยของเราในการตั้งค่าบัญชี
                    คุณต้องรักษาข้อมูลดังกล่าวให้เป็นความลับ คุณต้องไม่เปิดเผยต่อบุคคลที่สามใดๆ ทั้งสิ้น
                    เรามีสิทธิ์ในการปิดการใช้งานรหัสประจำตัวผู้ใช้ หรือรหัสผ่านของผู้ใช้
                    ไม่ว่าคุณจะเลือกหรือได้รับการจัดสรรจากเรา เมื่อใดก็ตามหากอยู่ในความเห็นที่สมเหตุสมผลของเรา
                    คุณไม่สามารถปฏิบัติตามกฎหมายที่ใช้บังคับหรือข้อกำหนดใดๆ
                    ในข้อกำหนดการใช้งานเหล่านี้และ/หรือหากเราเชื่อว่าบัญชีของคุณถูกใช้โดยไม่ได้รับอนุญาตหรือหลอกลวง
                    หากคุณทราบหรือสงสัยว่าบุคคลอื่นที่คุณรู้รหัสประจำตัวผู้ใช้หรือรหัสผ่านของคุณ คุณต้องแจ้งให้เราทราบทันทีที่ <a href="/cdn-cgi/l/email-protection#f39b969f83b380879281959a809b9f929189dd909c9e"><span class="__cf_email__" data-cfemail="1078757c605063647162767963787c71726a3e737f7d">[email&#160;protected]</span></a> หลังจากได้รับการแจ้งเตือนดังกล่าวแล้ว
                    คุณอาจจำเป็นต้องตั้งค่าบัญชีใหม่ด้วยรหัสประจำตัวและ/หรือรหัสผ่านใหม่
                </p>

                <h2 class="h4">5. ข้อตกลงระหว่างผู้ใช้เว็บไซต์ของเรา</h2>
                <p>เว็บไซต์ของเราอนุญาตให้นักการศึกษาหรือผู้สนใจเข้าใช้งานเพื่อจุดประสงค์ในการพัฒนาความรู้และทักษะในการเรียนการสอนของนักการศึกษาและนักเรียนผู้ได้รับการศึกษา
                    เราคาดหวังให้ผู้ใช้งานเว็ปไซต์ของเราปฎิบัติต่อผู้ใช้งานด้วยกันด้วยความเคารพและให้เกียรติซึ่งกันและกัน
                    เพื่อให้การใช้งานเป็นไปด้วยความสงบ เรียบร้อย</p>

                <h2 class="h4">6. สิทธิในทรัพย์สินทางปัญญา</h2>
                <p>เราเป็นเจ้าของหรือได้รับใบอนุญาตให้ใช้สิทธิ์ในทรัพย์สินทางปัญญาทั้งหมดบนเว็บไซต์ของเรา
                    และในเนื้อหาที่เผยแพร่บนเว็บไซต์ของเรา ทรัพย์สินทางปัญญาเหล่านี้ได้รับการคุ้มครองโดยกฎหมายลิขสิทธิ์
                    และสนธิสัญญา (และ/หรือกฎหมายทรัพย์สินทางปัญญาที่คล้ายคลึงกันตามที่เกี่ยวข้อง) ทั่วโลก สงวนสิทธิ์ทั้งหมดนี้
                    คุณสามารถพิมพ์สำเนาหนึ่งชุด
                    และสามารถดาวน์โหลดส่วนที่คัดลอกจากหน้าใดก็ได้บนเว็บไซต์ของเราเพื่อการใช้งานส่วนตัวของคุณ
                    คุณต้องไม่ดัดแปลงเนื้อหาใดๆ ในกระดาษหรือสำเนาดิจิทัลที่คุณพิมพ์ หรือดาวน์โหลดมาไม่ว่าในลักษณะใดก็ตาม
                    และคุณต้องไม่ใช้ภาพประกอบ ภาพวิดีโอ หรือเสียง หรือกราฟิกใดๆ แยกออกมาจากข้อความที่แนบมาด้วย
                    ต้องยอมรับสถานะของเรา (และผู้ให้ข้อมูลที่ระบุใดๆ) ในฐานะผู้เขียนเนื้อหาบนเว็บไซต์ของเรา
                    คุณต้องไม่ใช้เนื้อหาส่วนใดส่วนหนึ่งบนเว็บไซต์ของเราเพื่อจุดประสงค์ทางการค้าโดยไม่ได้รับใบอนุญาตจากเรา
                    หากคุณพิมพ์ คัดลอก หรือดาวน์โหลด ส่วนหนึ่งส่วนใดของเว็บไซต์เราโดยละเมิดข้อกำหนดการใช้งานเหล่านี้
                    สิทธิ์ในการใช้เว็บไซต์ของเราจะยุติลงทันที และคุณต้องเลือกว่าจะคืน หรือทำลายสำเนาเอกสารใดๆ ที่คุณทำขึ้นมา</p>

                <h2 class="h4">7. อัพโหลดเนื้อหาหรือนำเข้าข้อมูลไปยังเว็บไซต์ของเรา</h2>
                <p>เนื้อหาหรือข้อมูลใดก็ตามที่คุณอัพโหลดหรือนำเข้าข้อมูลไปยังเว็บไซต์ของเรา
                    หรือให้ข้อมูลแก่เราในลักษณะอื่นใดเพื่อให้เราใช้งานเว็บไซต์ ให้ถือว่าไม่เป็นความลับ และไม่สงวนลิขสิทธิ์
                    แม้คุณยังมีสิทธิ์ในการเป็นเจ้าของเนื้อหาหรือข้อมูลทั้งหมดของคุณ
                    แต่คุณยินยอมอนุญาตหรือให้สิทธิ์แก่เราและผู้ใช้รายอื่นบนเว็บไซต์ของเราเข้าถึงโดยไม่มีข้อจำกัด อนุญาตให้ใช้
                    จัดเก็บ และคัดลอกเนื้อหาและข้อมูลนั้นและแจกจ่ายและให้บริการแก่บุคคลที่สามได้ทั่วโลก
                    นอกจากนี้
                    เราขอสงวนสิทธิในการเปิดเผยตัวตนของคุณกับบุคคลที่สามหรือเจ้าหน้าที่หน่วยงานของรัฐที่อำนาจหน้าที่ตามกฎหมายที่สามารถพิสูจน์ได้ว่า
                    เนื้อหาหรือข้อมูลที่คุณโพสต์ อัพโหลด หรือนำเข้าไปยังเว็บไซต์ของเราเป็นการละเมิดสิทธิในทรัพย์สินทางปัญญา
                    หรือสิทธิในความเป็นส่วนตัวของบุคคลอื่นโดยไม่ชอบด้วยกฎหมาย
                    การอัพโหลดเนื้อหาหรือนำเข้าข้อมูลโดยผู้ใช้ จะต้องไม่ผิดต่อความสงบเรียบร้อยและหลักศีลธรรมอันดีของประชาชน
                    และต้องไม่เป็นข้อมูลที่เข้าข่ายเป็นความผิดตามพระราชบัญญัติว่าด้วยการกระทำความผิดเกี่ยวกับคอมพิวเตอร์ พ.ศ.2550
                    หรือความผิดตามกฎหมายอื่นแห่งราชอาณาจักรไทย
                    และเนื้อหาหรือข้อมูลที่ผู้ใช้อัพโหลดหรือนำเข้าสู่ระบบหรือเว็บไซต์ของเราถือว่าเป็นความรับผิดชอบของผู้ใช้
                    และหากพบข้อมูลซึ่งไม่เหมาะสม เราสามารถลบหรือทำลายข้อมูลดังกล่าวได้โดยไม่ต้องแจ้งให้ผู้ใช้ทราบล่วงหน้า</p>

                <h2 class="h4">8. การเชื่อมโยงไปยังเว็บไซต์ของเรา</h2>
                <p>หากคุณต้องการใช้งานเนื้อหาบนเว็บไซต์ของเรา กรุณาติดต่อ <a href="/cdn-cgi/l/email-protection#a1c9c4cdcdcee1d2d5c0d3c7c8d2c9cdc0c3db8fc2cecc"><span class="__cf_email__" data-cfemail="1179747d7d7e5162657063777862797d70736b3f727e7c">[email&#160;protected]</span></a></p>

                <h2 class="h4">9. ลิงก์และแหล่งข้อมูลของบุคคลที่สามบนเว็บไซต์ของเรา</h2>
                <p>ในกรณีที่เว็บไซต์ของเรามีลิงก์ไปยังเว็บไซต์และแหล่งข้อมูลอื่นๆ
                    ลิงก์เหล่านี้มีไว้ให้เพื่อเป็นข้อมูลของคุณเท่านั้น
                    เราไม่มีอำนาจควบคุมเนื้อหาของเว็บไซต์หรือแหล่งข้อมูลเหล่านั้น</p>

                <h2 class="h4">10. การเปลี่ยนแปลงข้อกำหนด</h2>
                <p>เราอาจแก้ไขข้อกำหนดเหล่านี้ได้ตลอดเวลาโดยการแก้ไขที่หน้านี้ เราจะใช้วิธีการที่เหมาะสม เช่น
                    การประกาศในสิ่งที่เกี่ยวข้องบนเว็บไซต์ของเราเพื่อแจ้งให้คุณทราบเกี่ยวกับการแก้ไขดังกล่าว อย่างไรก็ตาม
                    เราขอให้คุณตรวจสอบหน้านี้เป็นครั้งคราว เพื่อแจ้งให้ทราบถึงการเปลี่ยนแปลงใดๆ ที่เราทำขึ้น
                    เนื่องจากคุณจะต้องปฏิบัติตามข้อกำหนดในการให้บริการขณะที่คุณใช้งานเว็บไซต์ของเรา
                    หากคุณไม่เห็นด้วยกับการเปลี่ยนแปลงคุณต้องหยุดใช้งานเว็บไซต์</p>

                <h2 class="h4">11. เครื่องหมายการค้า</h2>
                <p>"Starfishlabz.com", “Starfish Maker” และ ”Starfish Eductation Foundation” โลโก้ ที่มีอยู่บนเว็บไซต์นี้
                    เป็นเครื่องหมายทางการค้าที่ลงทะเบียนไว้ และต้องไม่ถูกนำมาใช้ในทางใดก็ตาม
                    โดยปราศจากความยินยอมที่เป็นลายลักษณ์อักษรล่วงหน้าจากเรา</p>
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