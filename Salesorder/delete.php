<?php  
 $connect = mysqli_connect("localhost", "abd", "", "PaintShop");  
 $sql = "DELETE FROM Order_13022 WHERE OrderNo = '".$_POST["id"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>
