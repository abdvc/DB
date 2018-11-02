<?php
session_start();
include("config.php");
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

if($_POST){
	$usr=$_POST['Username'];
	$pass=$_POST['Password'];

	$sql = "SELECT * FROM User_13022 WHERE Username='$usr' AND Password='$pass'";
	$result = $mysqli->query($sql);
	if($result->num_rows == 1){
		//session_register("usr");
         	//$_SESSION['login_user'] = $usr;
         	
		$_SESSION["loggedin"] = true;
                $_SESSION["Username"] = $usr; 

         	header("location: welcome.php");
	} else {
		$error = $result->num_rows;
	}
}
?>

<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "Username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "Password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
