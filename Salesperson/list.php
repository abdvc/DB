<html>

<head><title>Customer List</title></head>

<div>
<?php
// Include config file
include("../config.php");
include("../session.php");

$id = $_GET['id'];
                    
// Attempt select query execution
$sql = "SELECT ShopID, ShopName FROM Customer_13022 WHERE SalespersonID = '$id'";
if($result = $mysqli->query($sql)){
	if($result->num_rows > 0){
		echo "<table class='table table-bordered table-striped' align='center'>";
		echo "<thead>";
		    echo "<tr>";
			echo "<th>ShopID</th>";
			echo "<th>ShopName</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
	                while($row = $result->fetch_array()){
    	                    echo "<tr>";
    	                   	 echo "<td>" . $row['ShopID'] . "</td>";
            	                echo "<td>" . $row['ShopName'] . "</td>";
                            echo "</tr>";
                       }
                       echo "</tbody>";                            
                       echo "</table>";
                       // Free result set
                       $result->free();
	} else{
		echo "<h2 align='center'><em>No records were found.</em></h2>";
	}
} else{
	echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
                    
// Close connection
$mysqli->close();
?>
</div>

<div align='center'>
<p><input type='button' value='Back' onclick='location.href="table.php"'/></p>
</div>

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


