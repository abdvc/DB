
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

$sql = "SELECT * FROM Salesperson_13022 WHERE SalespersonID='$id'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();


if($_POST){

	$name = $_POST['Name'];
	$contactno = $_POST['ContactNo'];

	$sql = "UPDATE Salesperson_13022 SET Name='$name', ContactNo='$contactno' WHERE SalespersonID={$id}";

	if ($mysqli->query($sql) === TRUE) {
		echo "Successful update";
	} else { echo "update error";}
}

$mysqli->close();

?>

<div class='container' align='center'><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method='post'>
	<p>Name: <br>
	<input type='text' name='Name' value="<?php echo $row['Name'] ?>"><br></p>
	<p>ContactNo: <br>
	<input type='text' name='ContactNo' value="<?php echo $row['ContactNo'] ?>"><br></p>
	<p><input type="submit" class="btn btn-primary" value="Save Changes"></p>
	<p><input type='button' value='Back' onclick='location.href="table.php"'/></p>
</form></div>

</body>
</html>


