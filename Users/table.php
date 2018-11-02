<html>
<head><title>Users</title></head>
<div>
<?php
// Include config file
include("../config.php");
include("../session.php");
                    
// Attempt select query execution
$sql = "SELECT * FROM User_13022";
if($result = $mysqli->query($sql)){
	if($result->num_rows > 0){
		echo "<table class='table table-bordered table-striped' align='center'>";
		echo "<thead>";
		    echo "<tr>";
			echo "<th>Username</th>";
			echo "<th>Active</th>";
    	                echo "<th>SalespersonID</th>";
			echo "<th>Actions</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
	                while($row = $result->fetch_array()){
    	                    echo "<tr>";
    	                   	 echo "<td>" . $row['Username'] . "</td>";
            	                echo "<td>" . $row['Active'] . "</td>";
				echo "<td>" . $row['SalespersonID'] . "</td>";
                	            echo "<td width=200>";
                	            echo "<a href='update.php?id=". $row['ID'] ."' title='Update Record'> Update </a>";
                	            echo "<a href='delete.php?id=". $row['ID'] ."' title='Delete Record'> Delete </a>";
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
	<p>Username: <br>
	<input type='text' name='Username'></p>
	<p>Password: <br>
	<input type='password' name='Password'><br></p>
	<p>Active: <br>
	<input type='text' name='Active'><br></p>
	<p>SalespersonID: <br>
	<input type='text' name='SalespersonID' placeholder='0 if not a salesperson'><br></p>
	<p><input type="submit" class="btn btn-primary" value="Submit">
	<input type='button' value='Back' onclick='location.href="../welcome.php"' /></p>
</form></div>

<?php
include("../config.php");

if($_POST){
	$usr = $_POST['Username'];
	$pass = $_POST['Password'];
	$active = $_POST['Active'];
	$spid = $_POST['SalespersonID'];

	$sql = "INSERT INTO User_13022 (Username, Password, Active, SalespersonID) VALUES ('$usr','$pass','$active', '$spid')";

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


