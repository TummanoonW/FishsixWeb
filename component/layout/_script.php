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

        <!-- The core Firebase JS SDK is always required and must be listed first -->
          <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-app.js"></script>
          <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-auth.js"></script>
          <!-- TODO: Add SDKs for Firebase products that you want to use
               https://firebase.google.com/docs/web/setup#available-libraries -->
          <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-analytics.js"></script>

          <? self::customScript($dir, 'firebase-init.js') ?>
<?php
        }

        public static function customScript($dir, $file){
?>
            <script src="<?php Nav::echoURL($dir, 'assets/js/custom/' . $file) ?>"></script>
<?php
        }
    }