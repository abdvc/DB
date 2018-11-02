<?php  
 $connect = mysqli_connect("localhost", "root", "", "PaintShop");  
 $output = '';  
 $sql = "SELECT * FROM Order_13022 WHERE ShopID='".$_POST["ShopID"]."' ORDER BY OrderNo";  
 $sql1 = "SELECT * FROM Customer_13022 WHERE ShopID='".$_POST["ShopID"]."'";
 $sql2 = "SELECT SalespersonID FROM Salesperson_13022";
 $sql3 = "SELECT PCode FROM Product_13022";
 $result = mysqli_query($connect, $sql);  
 $result1 = mysqli_query($connect, $sql1);
 $result2 = mysqli_query($connect, $sql2);
 $row = mysqli_fetch_array($result1);
 $output .= '  
	<h3>Invoice Header</h3>
	<table>
	 <tr>
	 <th style="background-color: 	#32CD32; padding: 20px;">Shop ID</th>
	 <th style="background-color: 	#32CD32; padding: 20px;">Shop_Name</th>
	 <th style="background-color: 	#32CD32; padding: 20px;">SalespersonID</th>
	 <th style="background-color: 	#32CD32; padding: 20px;">Contact_Person</th>
	 <th style="background-color: 	#32CD32; padding: 20px;">Contact_No</th>
	 <th style="background-color: 	#32CD32; padding: 20px;">Address</th>
	 <th style="background-color: 	#32CD32; padding: 20px;">Area</th>
	 <th style="background-color: 	#32CD32; padding: 20px;">Coordinates</th>
	 </tr>
	<tr>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["ShopID"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["ShopName"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["SalespersonID"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["ContactPerson"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["ContactNo"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["Address"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["Area"].'</td>
	     <td style="background-color: #90EE90; padding: 20px;">'.$row["Coordinates"].'</td>
	</tr>
	</table>
<h3>Invoice Lines</h3>
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%" style="padding: 20px;">Order No.</th>  
                     <th width="40%" style="padding: 20px;">Customer ID</th>  
                     <th width="40%" style="padding: 20px;">Date</th> 
                     <th width="40%" style="padding: 20px;">Salesperson ID</th>
                     <th width="40%" style="padding: 20px;">Product Code</th>
                     <th width="40%" style="padding: 20px;">Quantity</th>
                     <th width="40%" style="padding: 20px;">Rate</th>
                     <th width="40%" style="padding: 20px;">Amount</th> 
                     <th width="10%" style="padding: 20px;">Action</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
	   $result3 = mysqli_query($connect, $sql3);
	   $result2 = mysqli_query($connect, $sql2);
           $output .= '  
                <tr>  
                     <td class="OrderNo" data-id1="'.$row["OrderNo"].'" contenteditable>'.$row["OrderNo"].'</td>  
                     <td>'.$row["ShopID"].'</td> 
                     <td class="Date" data-id3="'.$row["OrderNo"].'" contenteditable>'.$row["Date"].'</td>
                     <td>';
		     $output .= '<select class="Salesperson form-control" data-id4="'.$row["OrderNo"].'">';
			$output .= '<option value="">None</option>';
    			while ($row1 = mysqli_fetch_array($result2)) { 
                  	$output .= '<option value="'.$row1["SalespersonID"].'"'.($row["SalespersonID"]==$row1["SalespersonID"]?'selected="selected"':"").'>'.$row1["SalespersonID"].'</option>';                
			}
    			$output .= '</select>
			</td>
                     	<td>';
		     	$output .= '<select class="Product form-control" data-id5="'.$row["OrderNo"].'">';
			$output .= '<option value="">None</option>';
    			while ($row2 = mysqli_fetch_array($result3)) { 
                  	$output .= '<option value="'.$row2["PCode"].'"'.($row["PCode"]==$row2["PCode"]?'selected="selected"':"").'>'.$row2["PCode"].'</option>';                
			}
    			$output .= '</select>
		     </td>
                     <td class="Qty" data-id6="'.$row["OrderNo"].'" contenteditable>'.$row["Qty"].'</td>
                     <td class="Rate" data-id7="'.$row["OrderNo"].'" contenteditable>'.$row["Rate"].'</td>
                     <td>'.$row["Amount"].'</td> 
                     <td><button type="button" name="delete_btn" data-id9="'.$row["OrderNo"].'" class="btn btn-xs btn-danger btn_delete">Delete</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="OrderNo" contenteditable></td>  
                <td id="ShopID">'.$_POST["ShopID"].'</td>  
                <td id="Date" contenteditable></td>  
                <td>';
		$output .= '<select id="Salesperson" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($connect, $sql2);
    		while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["SalespersonID"].'">'.$row1["SalespersonID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td>';
		$output .= '<select id="Product" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($connect, $sql3);
    		while ($row2 = mysqli_fetch_array($result3)) { 
                  $output .= '<option value="'.$row2["PCode"].'">'.$row2["PCode"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="Quantity" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
		<tr>  
                <td id="OrderNo" contenteditable></td>  
                <td id="ShopID">'.$_POST["ShopID"].'</td>  
                <td id="Date" contenteditable></td>  
                <td>';
		$output .= '<select id="Salesperson" class="form-control">';
		$output .= '<option value="">None</option>';
		$result2 = mysqli_query($connect, $sql2);
    		while ($row1 = mysqli_fetch_array($result2)) { 
                  $output .= '<option value="'.$row1["SalespersonID"].'">'.$row1["SalespersonID"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td>';
		$output .= '<select id="Product" class="form-control">';
		$output .= '<option value="">None</option>';
		$result3 = mysqli_query($connect, $sql3);
    		while ($row2 = mysqli_fetch_array($result3)) { 
                  $output .= '<option value="'.$row2["PCode"].'">'.$row2["PCode"].'</option>';                
		}
    		$output .= '</select>
		</td>  
                <td id="Quantity" contenteditable></td>  
                <td> - </td>  
                <td> - </td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Create</button></td>  
           </tr>
<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
