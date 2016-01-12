<?php
$dbHost = "localhost";
$dbBase = "Cars";
$dbUser = "root";
$dbPass = "";

$MYSQL_RES = mysql_connect($dbHost,$dbUser,$dbPass) OR DIE("Error of connection");
mysql_query("SET NAMES UTF8");
mysql_select_db($dbBase) or die(mysql_error());

  $cash='';
  $cover='img/cover.jpg';
  $show_cover=TRUE;
  $draw_line=FALSE;


  $selected_car='';

  if(empty ($_REQUEST['cash']) || (empty ($_REQUEST['income']))) {
      header('location:http://localhost/Cars/goal_index.php');
  }
  
  $income=$_REQUEST['income'];

  if(empty($_REQUEST['show_cover'])){ 
    $show_cover=FALSE;   
   } 

  if(!empty($_REQUEST['cash'])){ 
  $cash=$_REQUEST['cash'];}
  
  SetCookie("income",$income);
  SetCookie("cash",$cash);
  SetCookie("show_cover",$show_cover);

  
  if (!empty($_REQUEST['selected_car'])){
    $selected_car=$_REQUEST['selected_car'];}

   $where=''; 
  
   if(!empty($_REQUEST['country'])){
       $country=$_REQUEST['country'];
       $where="and `country`= '".$country."'" ;
       
   }

  $sql = "SELECT * FROM `cars` where active=1 ".$where." ORDER BY `cars`.`price`";
  $res = mysql_query($sql) or die(mysql_error());
  $cars = array();
  if(mysql_num_rows($res)){
  while($row=mysql_fetch_assoc($res)){
  $row['percent']=round(($cash*100)/$row['price']);
  if ($row['percent']>100){
    $row['percent']=100;
  } 
  if ($row['percent']==100){
   $draw_line=TRUE;   
  }

   $cars[$row['id']] = $row;
   if (empty($selected_car)) {
      $selected_car=$row['id'];
   } 
  }
 }
 //print_r($cars);
$percent=$cars[$selected_car]['percent'];


function create_hidden_pic($open_img,$cover_img,$percent,$new_jpg){
$pic=(1080*$percent)/100;
$dest = imagecreatefromjpeg($open_img);
$src = imagecreatefromjpeg($cover_img);

imagecopymerge($dest, $src, 0, 1080-(1080-$pic), 0, 0, 1920, 1080-$pic, 100);
imagejpeg($dest, $new_jpg);
imagedestroy($dest);
imagedestroy($src);
return $new_jpg;
}



function date_of_completion($cash_goal,$current_cash,$month_income){
     
     $month_left= round(($cash_goal-$current_cash)/$month_income);
     return $month_left;
}
$month_left=date_of_completion($cars[$selected_car]['price'], $cash, $income);

$today = time();
$next_date=$today + $month_left*30*24*60*60;
?>


<html>
    <head>
        <style>
            body{
                margin: 0px;
            }
            .descript{
              width:1000px; 
              margin: auto;
              background-color:rgba(151, 204, 45, 0.7);
              display: none;
              border-radius: 20px;
              text-align: justify; 
              margin-top:100px
            }
            .info{
                position: absolute;
                z-index: 1000;
                width:320px;
                background-color:rgba(179, 34, 34, 0.6);              
                right:0;
                margin: 10px;
                border-radius: 20px;
                padding: 20px;
                font-size: 15px;
                text-align: center;
                font-size: 18px;
            }
        </style>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div style="width: 100%;">
            
            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>


           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg">
               <div class="modal-content"id="main_description" style="padding:30px" >
               
                   
                <h1>
                   <?php if($selected_car){echo $cars[$selected_car]['title'];} ?>
               </h1>
                   
                   <div style="margin: 20px 0px 20px 0px">  
               <p> Мощность двигателя: <?php if($selected_car){echo $cars[$selected_car]['engine'];}?></p>
               <p> Максимальная скорость: <?php if($selected_car){echo $cars[$selected_car]['max_speed'];}?></p>
               <p> Максимальный крутящий момент: <?php if ($selected_car){ echo $cars[$selected_car]['max_torque'];}?></p>
               <p> Время разгона: <?php if ($selected_car){ echo $cars[$selected_car]['acceleration_time'];}?></p>
               <p> Расход топлива по городу: <?php if ($selected_car){ echo $cars[$selected_car]['consumption_city'];}?></p>
               <p> Расход топлива по трассе: <?php if ($selected_car){ echo $cars[$selected_car]['consumption_road'];}?></p>
               <p> Смешанный расход: <?php if ($selected_car){ echo $cars[$selected_car]['mixed'];}?></p>
                   </div>
                   
           <?php if($selected_car){echo $cars[$selected_car]['description'];}?><br>
           
           <div style="text-align: center;padding: 20px">
           <iframe width="560" height="315" src="<?php if($selected_car){echo $cars[$selected_car]['video'];}?>" frameborder="0" allowfullscreen></iframe> 
           </div>
          
           </div>
           </div>
           </div>
            
            
            <form id="main_form">   
             
                
                  
         <div class="info">
            <p style="color:white; padding: 0px 20px 0px 20px"><?php if($selected_car){echo $cars[$selected_car]['price'];}?> UAH, got <?php echo $percent; ?>%</p>
           
            <p style="color:white; padding: 0px 20px 10px 20px">Date of purchase: <br>
                <?php if($selected_car){echo date("F Y",$next_date);}?></p>
          
            <div>
                 <div style="text-align: center;display: inline-block">
                  <button type="button" class="btn btn-default"  data-toggle="modal" data-target=".bs-example-modal-lg" href="#"onclick="show_description()">More info</button>           
                 </div>
           
                <div style="width:100px;text-align: center;display: inline-block">
                  <a href="<?php if($selected_car){echo $cars[$selected_car]['url_site'];}?>">
                 <button type="button" class="btn btn-default">Buy now!</button> 
                  </a>
                 </div>
            </div>
         </div>
                
               
                
          <header style=" position:absolute; z-index:1000;text-align: center;">
                
            <input style="text-align: center; border-radius:5px" type="hidden" value="<?php echo $cash; ?>" name="cash" placeholder="cash" > 
            <input style="text-align: center; border-radius:5px" type="hidden"  value="<?php echo $income; ?>" name="income" placeholder="income" > 
            <input style="text-align: center; border-radius:5px" type="hidden"  value="<?php echo $show_cover; ?>" name="show_cover" > 
            <div class="btn-group" role="group" aria-label="..." style="margin:10px">
             
                
                <button type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <a style="text-decoration:none;color:black" href="http://localhost/Cars/goal_index.php"> Home </a>
                </button>
                
                
                

                <div class="btn-group" role="group">
            
                    
               
                    <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cars
                        <span class="caret"> </span>
                    </button>
                    <ul class="dropdown-menu" style=" left: 50%;right: auto;text-align: center;transform: translate(-50%, 0);">
               
                        <input type="hidden" name="selected_car">
            
                            <?php foreach ($cars as $key => $val){  ?>
                        
                         <?php
                              if($val['percent']<100&&$draw_line){
                              echo '<li role="separator" class="divider"></li>';
                              $draw_line=FALSE;
                              } ?>
                         
                        <li>
                       <a href="#" onclick="document.getElementsByName('selected_car')[0].value='<?php echo $val['id'];?>';document.getElementById('main_form').submit();"
                          style="font-weight:<?php if($val['percent']==100){echo "bold"; } ?>">
                         <?php echo $val['brand']." ".$val['model'];?>
                      </a>  
                       </li>
                       
                           <?php } ?>  
                        
                      
                    </ul>
                    
                </div>
                
            </div>

           </header>
            
                
                 <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
       <ol class="carousel-indicators">
       <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
       <li data-target="#carousel-example-generic" data-slide-to="1"></li>
       <li data-target="#carousel-example-generic" data-slide-to="2"></li>
       </ol>

    <?php if ($show_cover) {$url=create_hidden_pic('img/'.$cars[$selected_car]['image1'],$cover,$percent,'img/new1.jpg');
    $url2=create_hidden_pic('img/'.$cars[$selected_car]['image2'],$cover,$percent,'img/new2.jpg');
    $url3=create_hidden_pic('img/'.$cars[$selected_car]['image3'],$cover,$percent, 'img/new3.jpg');
    } 
      else {
          $url='img/'.$cars[$selected_car]['image1'];
          $url2='img/'.$cars[$selected_car]['image2'];
          $url3='img/'.$cars[$selected_car]['image3'];
      }?>
  <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
      
          <div class="item active">
              <img src="http://localhost/Cars/<?php if($selected_car){echo $url;}?>" alt="car">
      
      </div>
      
          <div class="item">
      <img src="http://localhost/Cars/<?php if($selected_car){echo $url2;}?>" alt="car">
     
    </div>
    
            <div class="item">
      <img src="http://localhost/Cars/<?php if($selected_car){echo $url3;}?>" alt="car">
     
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only"></span>
  </a>
          </div>
            
             <script> 
        $('.carousel').carousel();
            </script>

            <script>
                function show_description(){
                    document.getElementById('main_description').style.display="block";
                }       
           </script>
            
            </form>
        </div>

    </body>
</html>



