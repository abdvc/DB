<html>
<head><title>Salesperson</title></head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="../welcome.php" title="Homepage">My Paint shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="../Users/table.php">Users<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../Salesperson/table.php">Salespersons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../Customer/table.php">Customers</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="../Product/table.php">Product</a>
                    </li>

		    
                  </ul></div>
			<div align='right'><form action='../logout.php' align='right'>
			<input type="submit" value="Logout">
		    </form></div>
                
              </nav>
<div>
<br><br>
<?php
// Include config file
include("../config.php");
include("../session.php");
                    
// Attempt select query execution
$sql = "SELECT * FROM Salesperson_13022";
if($result = $mysqli->query($sql)){
	if($result->num_rows > 0){
		echo "<table class='table table-bordered table-striped' align='center'>";
		echo "<thead>";
		    echo "<tr>";
			echo "<th>SalespersonID</th>";
			echo "<th>Name</th>";
    	                echo "<th>ContactNo</th>";
    	                echo "<th>List of Customers</th>";
			echo "<th>Actions</th>";
                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
	                while($row = $result->fetch_array()){
    	                    echo "<tr>";
    	                   	 echo "<td>" . $row['SalespersonID'] . "</td>";
            	                echo "<td>" . $row['Name'] . "</td>";
				echo "<td>" . $row['ContactNo'] . "</td>";
				echo "<td><a href='list.php?id=". $row['SalespersonID'] ."'>List</a></td>";
                	            echo "<td width=200>";
                	            echo "<a href='update.php?id=". $row['SalespersonID'] ."' title='Update Record'> Update </a>";
                	            echo "<a href='delete.php?id=". $row['SalespersonID'] ."' title='Delete Record'> Delete </a>";
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
	<p>SalespersonID: <br>
	<input type='text' name='SalespersonID'></p>
	<p>Name: <br>
	<input type='text' name='Name'><br></p>
	<p>ContactNo: <br>
	<input type='text' name='ContactNo'><br></p>
	<p><input type="submit" class="btn btn-primary" value="Submit">
	<input type='button' value='Back' onclick='location.href="../welcome.php"' /></p>
</form></div>

<?php
include("../config.php");

if($_POST){
	$spid = $_POST['SalespersonID'];
	$name = $_POST['Name'];
	$contactno = $_POST['ContactNo'];


	if ($spid!='' || $name!='' || $contactno!='') {
		$sql = "INSERT INTO Salesperson_13022 (SalespersonID, Name, ContactNo) VALUES ('$spid','$name','$contactno')";

		if ($mysqli->query($sql) === TRUE) {
			echo "New Record added";
		} else {
			echo "Error " . $sql . ' ' . $mysqli->connect_error;
		}
	
		$mysqli->close();
	}
}


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</body>
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
navbar {
	font-family: verdana;
    height: 100%;
}
</style>
</html>


