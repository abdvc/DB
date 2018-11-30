
<!DOCTYPE HTML>
<html>

<head><title>Update</title></head>

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

<div class="page-header" align='center'>
	<h1>Update</h1>
</div>


<?php
include("../config.php");
include("../session.php");

$id = $_GET['id'];

$sql = "SELECT * FROM Customer_13022 WHERE ShopID='$id'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();


if($_POST){

	$shopname = $_POST['ShopName'];
	$spid = $_POST['SalespersonID'];
	$contact = $_POST['ContactPerson'];
	$contactno = $_POST['ContactNo'];
	$address = $_POST['Address'];
	$area = $_POST['Area'];
	$coord = $_POST['Coordinates'];

	$sql = "UPDATE Customer_13022 SET ShopName='$shopname', SalespersonID='$spid', ContactPerson='$contact', ContactNo='$contactno', Address='$address', Area='$area', Coordinates='$coord' WHERE ShopID={$id}";

	if ($mysqli->query($sql) === TRUE) {
		echo "Successful update";
	} else { echo "update error";}
}

$mysqli->close();

?>

<div class='container' align='center'><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method='post'>
	<p>ShopName: <br>
	<input type='text' name='ShopName' value="<?php echo $row['ShopName'] ?>"><br></p>
	<p>SalespersonID: <br>
	<input type='text' name='SalespersonID' value="<?php echo $row['SalespersonID'] ?>"><br></p>
	<p>ContactPerson: <br>
	<input type='text' name='ContactPerson' value="<?php echo $row['ContactPerson'] ?>"><br></p>
	<p>ContactNo: <br>
	<input type='text' name='ContactNo' value="<?php echo $row['ContactNo'] ?>"><br></p>
	<p>Address: <br>
	<input type='text' name='Address' value="<?php echo $row['Address'] ?>"><br></p>
	<p>Area: <br>
	<input type='text' name='Area' value="<?php echo $row['Area'] ?>"><br></p>
	<p>Coordinates: <br>
	<input type='text' name='Coordinates' value="<?php echo $row['Coordinates'] ?>"><br></p>
	<p><input type="submit" class="btn btn-primary" value="Save Changes"></p>
	<p><input type='button' value='Back' onclick='location.href="table.php"'/></p>
</form></div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</body>
<style>
navbar {
	font-family: verdana;
    height: 100%;
}
</style>
</html>


