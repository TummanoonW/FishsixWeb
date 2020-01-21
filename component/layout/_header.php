<?php 
    class Header{ //header elements loader

        public static function initHeader($dir, $title){
?>

            <!DOCTYPE html>
            <html lang="en" dir="ltr">

            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title><?php echo $title ?></title>

                <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
                <meta name="robots" content="noindex">

                <link rel="icon" href="<?php Asset::embedIcon($dir, 'cropped-logo-fishsix-32x32.png') ?>" sizes="32x32">
                <link rel="icon" href="<?php Asset::embedIcon($dir, 'cropped-logo-fishsix-192x192.png') ?>" sizes="192x192">
                <link rel="apple-touch-icon-precomposed" href="<?php Asset::embedIcon($dir, 'cropped-logo-fishsix-180x180.png') ?>">

                <!-- Perfect Scrollbar -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/vendor/perfect-scrollbar.css') ?>" rel="stylesheet">

                <!-- Material Design Icons -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/material-icons.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/material-icons.rtl.css') ?>" rel="stylesheet">

                <!-- Font Awesome Icons -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/fontawesome.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/fontawesome.rtl.css') ?>" rel="stylesheet">

                <!-- App CSS -->
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/app.css') ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/app.rtl.css') ?>" rel="stylesheet">

                <!-- jQuery -->
                <script src="<?php Nav::echoURL($dir, 'assets/vendor/jquery.min.js') ?>"></script>

                <!-- Kanit Font -->
                <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

                <link type="text/css" href="<?php Nav::echoURL($dir, 'assets/css/custom/main.css') ?>" rel="stylesheet">

                <script>var json = null;</script>

                <script type="text/javascript">
                $(document).ready(function() { 
                    var docHeight = $(window).height();
                    var footerHeight = $('#footer').height();
                    var footerTop = $('#footer').position().top + footerHeight;  
                    if (footerTop < docHeight) {
                        $('#footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
                    }
                });
                </script>
            </head>
<?php
        }
    }
?>
    
