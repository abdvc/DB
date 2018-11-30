<html>

<head><title>Customer</title></head>
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
		    <li class="nav-item">
                      <a class="nav-link " href="../Survey/survey.php">Survey</a>
                    </li>
		    <li class="nav-item">
                      <a class="nav-link " href="../dashboard.php">Dashboard</a>
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



<div class='container' align='center'>

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post'>
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
	</form>
</div>

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
	
	if ($shopid!='' || $shopname!='' || $spid!='' || $contact!='' || $contactno!='' || $address!='' || $area!='' || $coord!=''){

		$sql = "INSERT INTO Customer_13022 (ShopID, ShopName, SalespersonID, ContactPerson, ContactNo, Address, Area, Coordinates) VALUES ('$shopid','$shopname','$spid','$contact','$contactno','$address','$area','$coord')";

		if ($mysqli->query($sql) === TRUE) {
			echo "New Record added";
		} else {
			echo "Error " . $sql . ' ' . $mysqli->connect_error;
		}
	
		$mysqli->close();
	} else {
		$error = "Error : Enter fields";
	}
}


?>
<div style = "font-size:14px; color:#cc0000; margin-top:10px" align='center'><?php echo $error; ?></div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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


