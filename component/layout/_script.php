<?php

    class Script{
        public static function initScript($dir){
?>

            <!-- Bootstrap -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/popper.min.js') ?>"></script>
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/bootstrap.min.js') ?>"></script>
                    
            <!-- Perfect Scrollbar -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/perfect-scrollbar.min.js') ?>"></script>
                    
            <!-- MDK -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/dom-factory.js') ?>"></script>
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/material-design-kit.js') ?>"></script>
                    
            <!-- App JS -->
            <script src="<?php Nav::echoURL($dir, 'assets/js/app.js') ?>"></script>
                    
            <!-- Highlight.js -->
            <script src="<?php Nav::echoURL($dir, 'assets/js/hljs.js') ?>"></script>
                    
            <!-- App Settings (safe to remove) -->
            <script src="<?php Nav::echoURL($dir, 'assets/js/app-settings.js') ?>"></script>

            <!-- Proto DB -->
            <script src="<?php Nav::echoURL($dir, 'assets/js/custom/connect.js') ?>"></script>

            <!-- List.js -->
            <script src="<?php Nav::echoURL($dir, 'assets/vendor/list.min.js') ?>"></script>
            <script src="<?php Nav::echoURL($dir, 'assets/js/list.js') ?>"></script>
<?php
        }

        public static function customScript($dir, $file){
?>
            <script src="<?php Nav::echoURL($dir, 'assets/js/custom/' . $file) ?>"></script>
<?php
        }
    }