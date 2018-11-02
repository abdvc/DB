<html>  
      <head>  
           <title>SalesOrder</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <div class="table-responsive">
		     <div class="page-header">  
                     <h1 align="center">Salesorder Table</h1><br />
		     </div>  
	<h3>Select Customer ID:</h3>
	<?php
	$host = "localhost";
	$db_name = "PaintShop";
	$username = "root";
	$password = "";
	$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	$stmt = $con->prepare("select ShopID from Customer_13022");
	$stmt->execute();
    	echo "<select id='ShopID' class='form-control'>";
	echo '<option value="">None</option>';
    	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                  echo '<option value="'.$row["ShopID"].'">'.$row["ShopID"].'</option>';                
	}
    	echo "</select>";
	?>
	<br />
                     <div id="live_data"></div>            
                </div>  
           </div>  
      </body>  
</html>  
<script>  
 $(document).ready(function(){  
	var ShopID = $('#ShopID').val();
      $("#ShopID").change(function(){
       ShopID = $('#ShopID').val();
	fetch_data();
      });
      function fetch_data()  
      {  
           $.ajax({  
                url:"retrieve.php",  
                method:"POST",  
		data:{ShopID:ShopID},  
                dataType:"text",
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var OrderNo = $('#OrderNo').text();  
           var ShopID = ShopID;
	   var DATE = $('#Date').text();
	   var Salesperson = $('#Salesperson').val();
	   var PCode = $('#PCode').val();
	   var Qty1 = $('#Qty1').text(); 
	   var Rate1 = $('#Rate1').text();
	   var Qty = parseInt(Qty1);
	   var Rate = parseInt(Rate1);
	   var Amount = Qty*Rate;
           if(OrderNo == '')  
           {  
                alert("Enter ORDER NUMBER");  
                return false;  
           }    
           if(DATE == '')  
           {  
                alert("Enter DATE");  
                return false;  
           }   
           if(Qty == '')  
           {  
                alert("Enter QUANTITY");  
                return false;  
           }  
           $.ajax({  
                url:"create.php",  
                method:"POST",  
                data:{OrderNo:OrderNo, ShopID:ShopID, DATE:DATE, Salesperson:Salesperson, PCode:PCode, Qty:Qty, Rate:Rate, Amount:Amount},  
                dataType:"text",  
                success:function(data)  
                {  
                     //alert(data); 
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     //alert(data);  
	             fetch_data();
                }  
           });  
      }  
      $(document).on('blur', '.OrderNo', function(){  
           var id = $(this).data("id1");  
           var OrderNo = $(this).text();  
           edit_data(id, OrderNo, "OrderNo");  
      });   
      $(document).on('blur', '.Date', function(){  
           var id = $(this).data("id3");  
           var DATE = $(this).text();  
           edit_data(id, DATE, "DATE");  
      });  
      $(document).on('blur', '.Salesperson', function(){  
           var id = $(this).data("id4");  
           var Salesperson = $(this).val();  
           edit_data(id, Salesperson, "Salesperson");  
      });
      $(document).on('blur', '.PCode', function(){  
           var id = $(this).data("id5");  
           var PCode = $(this).val();  
           edit_data(id, PCode, "PCode");  
      });  
      $(document).on('blur', '.Qty', function(){  
           var id = $(this).data("id6");  
           var Qty = $(this).text();  
           edit_data(id, Qty, "Qty");  
      });
      $(document).on('blur', '.Rate', function(){  
           var id = $(this).data("id7");  
           var Rate = $(this).text();  
           edit_data(id, Rate, "Rate");  
      });   
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id9");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          //alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
</script>
