
<!DOCTYPE HTML>
<html>

<head><title>Update</title></head>

<body>
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

</body>
</html>


