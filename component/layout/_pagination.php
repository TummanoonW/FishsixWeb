<?php
    class Pagination{
        public static function initPagination($dir, $paths){
?>
            <ul class="pagination justify-content-center pagination-sm">

<?php 
                if($paths[0]->active){
?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                            <span>Prev</span>
                        </a>
                    </li>
<?php                 
                }else{
                    foreach ($paths as $key => $value) { 
                        if($value->active){
?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $paths[$key - 1]->url ?>" aria-label="Previous">
                            <span aria-hidden="true" class="material-icons">chevron_left</span>
                            <span>Prev</span>
                        </a>
                    </li>
<?php
                        }
                    }
                }

                foreach ($paths as $key => $value) { 
                    if($value->active){
?>
                        <li class="page-item active">
                            <a class="page-link" href="<?php echo $value->url ?>" aria-label="1">
                            <span><?php echo ($key+1) ?></span>
                            </a>
                        </li>
<?php
                    }else{
?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $value->url ?>" aria-label="1">
                            <span><?php echo ($key+1) ?></span>
                            </a>
                        </li>                        
<?php
                    }
                }

                if($paths[count($paths)-1]->active){
?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Next">
                            <span>Next</span>
                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                        </a>
                    </li>
<?php
                }else{
                    foreach ($paths as $key => $value) { 
                        if($value->active){
?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo $paths[$key + 1]->url ?>" aria-label="Next">
                            <span>Next</span>
                            <span aria-hidden="true" class="material-icons">chevron_right</span>
                        </a>
                    </li>                        
<?php
                        }
                    }
                }
?>
            </ul>
<?php
        }
    }