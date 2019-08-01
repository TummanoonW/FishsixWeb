<?php 
    class Breadcrumb{
        public static function initBreadcrumb($dir, $paths){
?>
            <ol class="breadcrumb">
                <?php foreach ($paths as $key => $value) { 
                        if($value->active){
                ?>
                            <li class="breadcrumb-item active"><?php echo $value->label ?></li>
                <?php   }else{    ?>
                            <li class="breadcrumb-item"><a href="<?php echo $value->url ?>"><?php echo $value->label ?></a></li>
                <?php   
                        } 
                    }
                ?>
            </ol>
<?php
        } 
    }