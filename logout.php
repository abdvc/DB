<?php
   include('config.php');
   session_start();
   $usr = $_SESSION['Username'];
   $a = 0;
   $sql2 = "UPDATE User_13022 SET Active='$a' WHERE Username='$usr'";
   if ($mysqli->query($sql2) === TRUE) {
   echo "Successful update";
   } else { echo $sql2;}

   if(session_destroy()) {
      header("Location: login.php");
   }
?>
