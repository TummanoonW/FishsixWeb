<?php
    class Footer{ //footer elements loader

        public static function initFooter($dir){
?>
                <!-- Custom Script -->
                <?php Script::customScript($dir, 'common.js') ?>
                <?php Script::customScript($dir, 'connect.js') ?>
                
                <script>
                    var btn = document.querySelector('#btn-menu');
                    $(document).ready(function(){
                    //    btn.click();
                    });
                </script>
            </body>
            </html>
<?php
        }
    }
?>