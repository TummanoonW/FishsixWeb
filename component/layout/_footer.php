<?php
    class Footer{ //footer elements loader

        public static function initFooter($dir){
?>
                <!-- jQuery -->
                <script src="<?php Nav::printURL($dir, 'assets/vendor/jquery.min.js'); ?>"></script>

                <!-- Bootstrap -->
                <script src="<?php Nav::printURL($dir, 'assets/vendor/popper.min.js'); ?>"></script>
                <script src="<?php Nav::printURL($dir, 'assets/vendor/bootstrap.min.js'); ?>"></script>

                <!-- Perfect Scrollbar -->
                <script src="<?php Nav::printURL($dir, 'assets/vendor/perfect-scrollbar.min.js'); ?>"></script>

                <!-- MDK -->
                <script src="<?php Nav::printURL($dir, 'assets/vendor/dom-factory.js'); ?>"></script>
                <script src="<?php Nav::printURL($dir, 'assets/vendor/material-design-kit.js'); ?>"></script>

                <!-- App JS -->
                <script src="<?php Nav::printURL($dir, 'assets/js/app.js'); ?>"></script>

                <!-- Highlight.js -->
                <script src="<?php Nav::printURL($dir, 'assets/js/hljs.js'); ?>"></script>

                <!-- App Settings (safe to remove) -->
                <script src="<?php Nav::printURL($dir, 'assets/js/app-settings.js'); ?>"></script>

            </body>
            </html>
<?php
        }
    }
?>