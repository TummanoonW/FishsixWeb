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

                <!-- Perfect Scrollbar -->
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/vendor/perfect-scrollbar.css'); ?>" rel="stylesheet">

                <!-- Material Design Icons -->
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/material-icons.css'); ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/material-icons.rtl.css'); ?>" rel="stylesheet">

                <!-- Font Awesome Icons -->
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/fontawesome.css'); ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/fontawesome.rtl.css'); ?>" rel="stylesheet">

                <!-- App CSS -->
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/app.css'); ?>" rel="stylesheet">
                <link type="text/css" href="<?php Nav::printURL($dir, 'assets/css/app.rtl.css'); ?>" rel="stylesheet">





            </head>
<?php
        }
    }
?>
    
