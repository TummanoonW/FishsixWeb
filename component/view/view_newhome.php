<?php
    class HomeView{
        public static function initView($dir){
            
?>
 <?php Toolbar::initToolbar($dir) ?>
 <script type="text/javascript" src="./assets/js/frontpage.js"></script>
<body  style="background-color:black;">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<div class="container">
    
       <section id="row1">
       <h1 class="sectionTitle" style="color:white;">รูปแบบการเรียน</h1>
      
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="#"></a>
      
    </div>
    <?php 
    $url = "http://trialation.com/fishsix-api/apiHome.php?m=courses&q=%7B%22n%22%3A10";
    $jsondata = file_get_contents($url);
    $obj = json_decode($jsondata,true);
    ?>
       <div class="examples">
          <ul class="img-list">
          <?php foreach($obj['response'] as $response){ ?>
             <li class="image">
                <a href="#<?php echo $response['ID'];?>">
                   <img id="box1" src="<?php echo $response['thumbnail'];?>" width="280" height="150" />
                   <span class="text-content"><span><?php echo $response['title'];?>
                   <br><br>
                   <i class="fa fa-4x  fa-play-circle-o"></i
                   ><br><br><i class="fa fa-chevron-down" onclick="openNav()" aria-hidden="true"></i></span></span>
                </a>
             </li>
          <?php }?>  
    
          </ul>
    
       </div>
    
       </section>
       
       <section id="row2">
       <h1 class="sectionTitle">TV Shows</h1>
       <div class="examples">
          <ul class="img-list">
             <li class="image">
                <a href="#">
                   <img src="http://placehold.it/280x150" width="280" height="150" />
                   <span class="text-content"><span>Title Here...<br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br><i class="fa fa-chevron-down" aria-hidden="true"></i></span></span>
                </a>
             </li>
    
             <li class="image">
                <a href="#">
                   <img src="http://placehold.it/280x150" width="280" height="150" />
                   <span class="text-content"><span>Title Here...<br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br><i class="fa fa-chevron-down" aria-hidden="true"></i></span></span>
                </a>
             </li>
    
             <li class="image">
                <a href="#">
                   <img src="http://placehold.it/280x150" width="280" height="150" />
                   <span class="text-content"><span>Title Here...<br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br><i class="fa fa-chevron-down" aria-hidden="true"></i></span></span>
                </a>
             </li>
    
          </ul>
       </div>
       </section>
       <h1 class="sectionTitle">Row 3</h1>
       <div class="examples">
          <ul class="img-list">
             <li class="image">
                <a href="#">
                   <img src="http://placehold.it/280x150" width="280" height="150" />
                   <span class="text-content"><i class="fa fa-chevron-up" aria-hidden="true"></i><br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br>Title Here...</span></span>
                </a>
             </li>
    
             <li class="image">
                <a href="#">
                   <img src="http://placehold.it/280x150" width="280" height="150" />
                   <span class="text-content"><i class="fa fa-chevron-up" aria-hidden="true"></i><br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br>Title Here...</span></span>
                </a>
             </li>
    
             <li class="image">
                <a href="#">
                   <img src="http://placehold.it/280x150" width="280" height="150" />
                   <span class="text-content"><i class="fa fa-chevron-up" aria-hidden="true"></i><br><br><i class="fa fa-4x  fa-play-circle-o"></i><br><br>Title Here...</span></span>
                </a>
             </li>
    
          </ul>
       </div>
    </div>  
          </body>
<?php
}
         
}
?>