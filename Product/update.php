
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

$sql = "SELECT * FROM Product_13022 WHERE PCode='$id'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();


if($_POST){

	$brand = $_POST['Brand'];
	$type = $_POST['Type'];
	$shade = $_POST['Shade'];
	$size = $_POST['Size'];
	$price = $_POST['Price'];

	$sql = "UPDATE Product_13022 SET Brand='$brand', Type='$type', Shade='$shade', Size='$size', Price='$price' WHERE PCode={$id}";

	if ($mysqli->query($sql) === TRUE) {
		echo "Successful update";
	} else { echo "update error";}
}

$mysqli->close();

?>

<div class='container' align='center'><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method='post'>
	<p>Brand: <br>
	<input type='text' name='Brand' value="<?php echo $row['Brand'] ?>"><br></p>
	<p>Type: <br>
	<input type='text' name='Type' value="<?php echo $row['Type'] ?>"><br></p>
	<p>Shade: <br>
	<input type='text' name='Shade' value="<?php echo $row['Shade'] ?>"><br></p>
	<p>Size: <br>
	<input type='text' name='Size' value="<?php echo $row['Size'] ?>"><br></p>
	<p>Price: <br>
	<input type='text' name='Price' value="<?php echo $row['Price'] ?>"><br></p>
	<p><input type="submit" class="btn btn-primary" value="Save Changes"></p>
	<p><input type='button' value='Back' onclick='location.href="table.php"'/></p>
</form></div>

</body>
</html>


