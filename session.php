<?php
   include('config.php');
   session_start();
   
   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location:/DB/login.php");
   }
?>
