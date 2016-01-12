<?php

$message_sent=FALSE;
$name="";
$email="";
$message="";

if(!empty($_REQUEST['name'])){ 
    $name=$_REQUEST['name'];           
}

if(!empty($_REQUEST['email'])){ 
    $email=$_REQUEST['email'];           
}

if(!empty($_REQUEST['message'])){ 
    $message=$_REQUEST['message'];           
}


if ($name!=""&& $email!=""&& $message!="") {
    
    $mysqli = new mysqli('localhost', 'root', '', 'Cars'); 

    if (mysqli_connect_errno()) { 
    echo "Error: ".mysqli_connect_error(); 
    exit(); 
    } 
    
    $stmt = $mysqli->prepare("INSERT INTO `Cars`.`contact_us` (`name`, `email`, `message`) VALUES (?, ?, ?);"); 
    $stmt->bind_param('sss', $name, $email, $message); 


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
            
            .text{
               background-color:rgba(255, 255, 255, 0.6);
               border-radius: 10px;
               border: 2px solid gainsboro;
               width:1000px;
               margin:200px auto;
               font-family: sans-serif;
               padding: 20px
            }
            
            .send_button{
                margin-top:20px;
                padding: 10px 30px;
                background-color: rgb(78,120,182);
                color:white;
                border-radius: 6px;
                border:1px solid rgb(78,120,182);
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
        
        <div class="text">
        
        <?php if($message_sent) { ?>

            <div style="color:black;font-size: 30px;margin-top: 49px; text-align: center;font-weight: lighter">
                Thank you, your message has been sent!   
            </div>

            
        <?php }  else {   ?>
        
        

        
        <?php if(!$message_sent) { ?>
        <form id="main_form" action="http://localhost/Cars/contact_us.php">
        <p style="text-decoration:none;color: black; font-size: 40px;text-align: justify">  Contact </p>
        <p style="text-decoration:none;color: black; font-size: 20px;text-align: justify">
            Ask a question, leave a comment. Leave us a message and someone from the team will get back to you as soon as possible!        
        </p>
        
        <div class="input-group">

        <input name="name" type="text" class="form-control" placeholder="Name" aria-describedby="sizing-addon2" value="<?php echo $name; ?>">
        <input name="email" type="text" style="margin-top:10px" class="form-control" placeholder="Email" aria-describedby="sizing-addon2" value="<?php echo $email; ?>">
        

        <textarea name="message" style="margin-top:30px;padding-bottom: 40px" class="form-control" placeholder="Message" value="<?php echo $message; ?>"></textarea>
        
        <p>
            <input type="submit" class="send_button" value="Send">
        </p>
        
        </div>
        </div>
         
        </form>
       
        <?php } ?>
        
        <?php } ?>

    </body>
</html>