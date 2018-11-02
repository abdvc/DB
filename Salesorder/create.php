<?php  
 $connect = mysqli_connect("localhost", "root", "", "PaintShop");  
 $res = mysqli_query($connect, "SELECT Price FROM PRODUCT_13022 WHERE PCode='".$_POST["PCode"]."'");
 $row = mysqli_fetch_array($res);
 $sql = "INSERT INTO Order_13022 VALUES('".$_POST["OrderNo"]."', '".$_POST["ShopID"]."', '".$_POST["Date"]."', '".$_POST["SalespersonID"]."', '".$_POST["PCode"]."', '".$_POST["Qty"]."', '".$row["Rate"]."', '".$_POST["Amount"]."')";  
 if(mysqli_query($connect, $sql))  
 {  
      mysqli_query($connect, "UPDATE Order_13022 SET Amount=Rate*Qty WHERE OrderNo='".$_POST["OrderNo"]."'");
      echo 'Data Inserted';  
 }  
 ?> 
