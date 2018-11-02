
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

$sql = "SELECT * FROM User_13022 WHERE ID='$id'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();


if($_POST){
	$usr = $_POST['Username'];
	$pass = $_POST['Password'];
	$active = $_POST['Active'];
	$spid = $_POST['SalespersonID'];

	$sql = "UPDATE User_13022 SET Username='$usr', Password='$pass', Active='$active', SalespersonID='$spid' WHERE ID={$id}";

	if ($mysqli->query($sql) === TRUE) {
		echo "Successful update";
	} else { echo "update error";}
}

$mysqli->close();

?>

<div class='container' align='center'><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method='post'>
	<p>Username: <br>
	<input type='text' name='Username' value="<?php echo $row['Username'] ?>"><br></p>
	<p>Password: <br>
	<input type='password' name='Password' value="<?php echo $row['Password'] ?>"><br></p>
	<p>Active: <br>
	<input type='text' name='Active' value="<?php echo $row['Active'] ?>"><br></p>
	<p>SalespersonID: <br>
	<input type='text' name='SalespersonID' value="<?php echo $row['SalespersonID'] ?>"><br></p>
	<p><input type="submit" class="btn btn-primary" value="Save Changes"></p>
	<p><input type='button' value='Back' onclick='location.href="table.php"'/></p>
</form></div>

</body>
</html>


