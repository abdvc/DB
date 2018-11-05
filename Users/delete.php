<html>

<head><title>Item deleted</title></head>

<body>

<?php
include("../config.php");
include("../session.php");

$id = $_GET['id'];

$sql = "DELETE FROM User_13022 WHERE ID = '$id'";

if($mysqli->query($sql) === TRUE) {
	header('location: table.php');
} else { echo "Error"; }
?>

</body>
</html>
