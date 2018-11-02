<html>

<head><title>Customer</title></head>

<div>
<?php
// Include config file
include("../config.php");
include("../session.php");
                    
// Attempt select query execution
$sql = "SELECT * FROM Customer_13022";
if($result = $mysqli->query($sql)){
	if($result->num_rows > 0){
		echo "<table class='table table-bordered table-striped' align='center'>";
		echo "<thead>";
		    echo "<tr>";
			    echo "<th>ShopID</th>";
    	                echo "<th>ShopName</th>";
			echo "<th>SalespersonID</th>";
			echo "<th>ContactPerson</th>";
    	                echo "<th>ContactNo</th>";
			echo "<th>Address</th>";
    	                echo "<th>Area</th>";
    	                echo "<th>Coordinates</th>";
			echo "<th>Actions</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
	                while($row = $result->fetch_array()){
    	                    echo "<tr>";
    	                   	 echo "<td>" . $row['ShopID'] . "</td>";
            	                echo "<td>" . $row['ShopName'] . "</td>";
				echo "<td>" . $row['SalespersonID'] . "</td>";
                	            echo "<td>" . $row['ContactPerson'] . "</td>";
                	            echo "<td>" . $row['ContactNo'] . "</td>";
				    echo "<td>" . $row['Address'] . "</td>";
				    echo "<td>" . $row['Area'] . "</td>";
				    echo "<td>" . $row['Coordinates'] . "</td>";
                	            echo "<td width=200>";
                	            echo "<a href='update.php?id=". $row['ShopID'] ."' title='Update Record'> Update </a>";
                	            echo "<a href='delete.php?id=". $row['ShopID'] ."' title='Delete Record'> Delete </a>";
                	            echo "</td>";
                            echo "</tr>";
                       }
                       echo "</tbody>";                            
                       echo "</table>";
                       // Free result set
                       $result->free();
	} else{
		echo "<p class='lead'><em>No records were found.</em></p>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
                    
// Close connection
$mysqli->close();
?>
</div>



<div class='container' align='center'><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
	<p>ShopID: <br>
	<input type='text' name='ShopID'></p>
	<p>ShopName: <br>
	<input type='text' name='ShopName'><br></p>
	<p>SalespersonID: <br>
	<input type='text' name='SalespersonID'><br></p>
	<p>ContactPerson: <br>
	<input type='text' name='ContactPerson'><br></p>
	<p>ContactNo: <br>
	<input type='text' name='ContactNo'><br></p>
	<p>Address: <br>
	<input type='text' name='Address'><br></p>
	<p>Area: <br>
	<input type='text' name='Area'><br></p>
	<p>Coordinates: <br>
	<input type='text' name='Coordinates'><br></p>
	<p><input type="submit" class="btn btn-primary" value="Submit">
	<input type='button' value='Back' onclick='location.href="../welcome.php"' /></p>
</form></div>

<?php
include("../config.php");

if($_POST){
	$shopid = $_POST['ShopID'];
	$shopname = $_POST['ShopName'];
	$spid = $_POST['SalespersonID'];
	$contact = $_POST['ContactPerson'];
	$contactno = $_POST['ContactNo'];
	$address = $_POST['Address'];
	$area = $_POST['Area'];
	$coord = $_POST['Coordinates'];

	$sql = "INSERT INTO Customer_13022 (ShopID, ShopName, SalespersonID, ContactPerson, ContactNo, Address, Area, Coordinates) VALUES ('$shopid','$shopname','$spid','$contact','$contactno','$address','$area','$coord')";

	if ($mysqli->query($sql) === TRUE) {
		echo "New Record added";
	} else {
		echo "Error " . $sql . ' ' . $mysqli->connect_error;
	}
	
	$mysqli->close();
}


?>


<style>
table, th {

    border: 3px solid black;
    border-collapse: collapse;
}
td {
	border: 1px solid black;
	border-collapse: collapse;
}
th {
		
    padding: 25px;
    text-align: center;
}
td {
	padding: 15px;
	text-align: center;
}
th {
	background-color: #CD5C5C;
}
td{
	background-color: #FFA07A;
}

</style>
</html>


