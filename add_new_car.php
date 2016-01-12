<?php

$message_sent=FALSE;

$brand='';
$model='';
$price='';
$title='';

$description='';
$engine='';
$max_speed='';
$url_site='';


if(!empty($_REQUEST['brand'])){ 
    $brand=$_REQUEST['brand'];}
    
if(!empty($_REQUEST['model'])){ 
    $model=$_REQUEST['model'];           
}
if(!empty($_REQUEST['price'])){ 
    $price=$_REQUEST['price'];}
    
if(!empty($_REQUEST['title'])){ 
    $title=$_REQUEST['title'];           
}


if(!empty($_REQUEST['description'])){ 
    $description=$_REQUEST['description'];}
    
if(!empty($_REQUEST['engine'])){ 
    $engine=$_REQUEST['engine'];           
}
if(!empty($_REQUEST['max_speed'])){ 
    $max_speed=$_REQUEST['max_speed'];}
    
if(!empty($_REQUEST['url_site'])){ 
    $url_site=$_REQUEST['url_site'];           
}


if ($brand!="" && $model!="" && $price!="" && $title!="" && $description!="" && $engine!="" && $max_speed!="" && $url_site!="" ) {
    
    $mysqli = new mysqli('localhost', 'root', '', 'Cars'); 

    if (mysqli_connect_errno()) { 
    echo "Error: ".mysqli_connect_error(); 
    exit(); 
    } 
    mysqli_set_charset($mysqli, 'utf8');

$stmt = $mysqli->prepare("INSERT INTO `Cars`.`cars` (`brand`, `model`, `price`, `title`, `description`, `engine`, `max_speed`, `url_site`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);"); 
$stmt->bind_param('ssisssss', $brand, $model, $price, $title, $description, $engine, $max_speed, $url_site);

$stmt->execute(); 

if ($stmt->affected_rows>0) {
    $message_sent=TRUE;
}


$stmt->close(); 

$mysqli->close();
    

}

?>

<html>
    <head>
        <style>
            body{
               margin: 0px;
               background-image: url(http://localhost/Cars/img/blur.jpg);
            }
            header{
                color:white;
                font-size: 26px;
                margin-left: 20px
            }

        </style>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/cabrioletred_6064.ico" type="image/x-icon"> 
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>

            <div style="background-color:rgba(255, 255, 255, 0.6);text-align: center; margin:200px auto;border-radius: 10px; border: 2px solid gainsboro;">
                      
             <div class="input-group input-group-lg" style="margin:100px auto;">
            
                    <form action="http://localhost/Cars/add_new_car.php">
                        
                        <div style="float:left;width:500px;margin: auto;">
                 <input required name="brand" class="form-control" type="text" placeholder="Brand" aria-describedby="basic-addon2" value="<?php echo $brand; ?>"> 
                 <input required name="model" class="form-control" type="text" placeholder="Model" aria-describedby="basic-addon2" value="<?php echo $model; ?>">
                 <input required name="price" class="form-control" type="text" placeholder="Price" aria-describedby="basic-addon2" value="<?php echo $price; ?>"> 
                 <input required name="title" class="form-control" type="text" placeholder="Title" aria-describedby="basic-addon2" value="<?php echo $title; ?>">
                        </div>
                        
                        
                        <div style="float:right;width:500px;margin: auto;">
                 <input required name="description" class="form-control" type="text" placeholder="Description" aria-describedby="basic-addon2" value="<?php echo $description; ?>"> 
                 <input required name="engine" class="form-control" type="text" placeholder="Engine" aria-describedby="basic-addon2" value="<?php echo $engine; ?>">
                 <input required name="max_speed" class="form-control" type="text" placeholder="Max Speed" aria-describedby="basic-addon2" value="<?php echo $max_speed; ?>"> 
                 <input required name="url_site" class="form-control" type="text" placeholder="Offical site" aria-describedby="basic-addon2" value="<?php echo $url_site; ?>">
                        </div>
                        
                        
               <?php if ($message_sent) { ?>
                 <a style="font-size: 18px;color:white;margin-top: 10px;text-decoration: none;">Your car has been added!</a>
               <?php } else  {   ?> 
                 
                 <div style="text-align: center;font-size: 16px;">
                 <button style="width:100px; margin:20px auto 0px auto; padding: 5px;" type="submit">Add!</button>
                 </div>
               <?php } ?>
               
                    </form>
             </div>
            
        </div>
        
    </body>
</html>
