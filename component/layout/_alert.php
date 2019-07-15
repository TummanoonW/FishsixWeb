<?php
    class Alert{
        public static function initAlert($dir, $msg){
?>
            <div class="alert alert-light alert-dismissible border-1 border-left-3 border-left-warning" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="text-black-70"><?php echo $msg; ?></div>
            </div>
<?php
        }
    }