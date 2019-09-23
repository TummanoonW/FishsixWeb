<?php
    class Style{
        public static function customStyle($dir, $file){
            $arr = explode(".", $file);
            $lenght = count($arr);
            if($lenght == 1) $file = $file . ".css";
?>
            <link rel="stylesheet" href="<?php echo Nav::echoURL($dir, 'assets/css/custom/' . $file) ?>">
<?php
        }
    }