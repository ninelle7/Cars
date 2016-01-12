<?php 

$page="";
$available_pages=array();
$available_pages ['goal_index']['title']='Goal Home';
$available_pages ['goal_index']['show_header']=TRUE;
$available_pages ['goal_index']['main_description']=TRUE;

$available_pages ['goal']['title']='Goal';
$available_pages ['goal']['show_header']=FALSE;
$available_pages ['goal']['main_description']=FALSE;

$available_pages ['add_new_car']['title']='Add New Car';
$available_pages ['add_new_car']['show_header']=TRUE;
$available_pages ['add_new_car']['main_description']=FALSE;

$available_pages ['contact_us']['title']='Contacts Us';
$available_pages ['contact_us']['show_header']=TRUE;
$available_pages ['contact_us']['main_description']=FALSE;

$available_pages ['about_brands']['title']='About Brands';
$available_pages ['about_brands']['show_header']=TRUE;
$available_pages ['about_brands']['main_description']=FALSE;

if (!empty($_REQUEST['page'])) { 
    $page=$_REQUEST['page'];
 }
 if (empty($available_pages[$page])) {
    $page='goal_index';
}   

$cash='';
$income='';
$show_cover='';
$country='';



if(!empty ($_COOKIE['income'])){
  $income=$_COOKIE['income'];} 

if(!empty ($_COOKIE['cash'])){
  $cash=$_COOKIE['cash'];} 
  
if(!empty($_COOKIE['show_cover'])){
$show_cover='checked';}

if (!empty($_COOKIE['country'])) {
    $country=$_COOKIE['country'];
}
 
$dbHost = "localhost";
$dbBase = "Lessons";
$dbUser = "root";
$dbPass = "";



$MYSQL_RES = mysql_connect($dbHost,$dbUser,$dbPass) OR DIE("Error of connection");
mysql_query("SET NAMES UTF8");
mysql_select_db($dbBase) or die(mysql_error());

  $sql = "SELECT `country` FROM `cars` group BY `country` ORDER BY `id` ASC";
  $res = mysql_query($sql) or die(mysql_error());
  $countries = array();
  if(mysql_num_rows($res)){
  while($row=mysql_fetch_assoc($res)){
      $countries[]=$row['country'];
  }
 }

?>
<html>
    <head>
        <style>
            body{
               margin: 0px;
               background-image: url(http://localhost/Cars/img/blur.jpg);
               background-size: cover;
            }
            header{
                color:white;
                font-size: 26px;
                background-color: black;
                   
            }

        </style>
        <title><?php echo $available_pages[$page]['title']; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/cabrioletred_6064.ico" type="image/x-icon"> 
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <div>
            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>

            
            
            <?php if ($available_pages[$page]['show_header']) { ?>  
            <header>   
           
            <a href="http://localhost/Cars/goal_index.php">   <img style="width:70px" src="http://localhost/Cars/img/car.png"> </a>
            <a style="padding-left: 30px;text-decoration:none;color: white; font-size: 22px;" href="http://localhost/Cars/goal_index.php?page=add_new_car">Add new car</a>
            <a style="padding-left: 20px;text-decoration:none;color: white; font-size: 22px;" href="http://localhost/Cars/goal_index.php?page=contact_us">Contact us</a>
            </header>
                 <?php 
            
            if ($page!=""&&$page!='goal_index') {
            include $page.'.php';
                           }       
            ?>
            <?php } ?>
            
            
            
            <?php if ($available_pages[$page]['main_description']) { ?>  
            <form id="main_form" action="http://localhost/Cars/goal.php">
            <div style="background-color:rgba(255, 255, 255, 0.6);width:600px; margin:200px auto;border-radius: 10px; border: 2px solid gainsboro;">
             
                <p style="text-align: justify;padding: 10px 20px;font-size: 30px"> This site about cars.</p>
                <a style="text-align: justify; padding:0px 20px ;font-size: 20px;color: black"> Check how long can you buy a new one?</a><br>
                <a style="text-align: justify; padding:0px 20px ;font-size: 20px;color: black"> Fill out the fields and click UAH.</a>   
                
             <div class="input-group input-group-lg" style="padding: 20px">
            <input type="text" class="form-control" name="cash" placeholder="Enter your amount" aria-describedby="basic-addon2" value="<?php echo $cash; ?>">  
            <input type="text" style="margin-top:20px" class="form-control" name="income" placeholder="Enter your income" aria-describedby="basic-addon2" value="<?php echo $income; ?>">
            
            <span class="input-group-addon" style="cursor:pointer;" onclick="document.getElementById('main_form').submit();" id="basic-addon2">UAH</span> 
            </div>
                
                
              <div class="btn-group" style="left: 50%;right: auto;text-align: center;transform: translate(-50%, 0);margin-bottom: 10px">

                <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 160px;font-size: 14px;">
                   Countries
                </button>
                    <ul class="dropdown-menu" >
               
                       <input type="hidden" name="country">           
                
                        <?php foreach ($countries as $key => $val){  ?>

                        <li>
                          <a href="#" onclick="document.getElementsByName('country')[0].value='<?php echo $val;?>'">
                             <?php echo $val;?>    
                          </a>
                       </li>
                       
                           <?php } ?>  
 
                    </ul>
                    
              </div>
                
                
                <div style="width: 160px;margin: auto;margin-bottom: 30px">
           
                    <span style="background-color: rgb(255,255,255);border-radius: 6px;padding: 13px;" class="input-group-addon">
                Show progress    <input type="checkbox" name="show_cover" aria-label="..." <?php echo $show_cover ?>>
             </span>
                    
                </div>

           </div>
            </form>
            <?php }?>
        </div>
    </body>
</html>
