<?php  
 $connect = mysqli_connect("localhost", "root", "", "PaintShop");  
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE Order_13022 SET ".$column_name."='".$text."' WHERE OrderNo='".$id."'"; 
 if($column_name=='PCode'){
	$res = mysqli_query($connect, "SELECT Price FROM Product_13022 WHERE PCode='".$text."'");
	$row = mysqli_fetch_array($res);
	mysqli_query($connect, "UPDATE SALESORDER_13102 SET RATE='".$row['PRICE']."' WHERE ORDER_NO='".$id."'");
 } 
 if(mysqli_query($connect, $sql))  
 {  
      mysqli_query($connect, "UPDATE Order_13022 SET Amount=Rate*Qty WHERE OrderNo='".$id."'");
      echo 'Data Updated';  
 }  
 ?>
