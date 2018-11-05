<html>

<head><title>Item deleted</title></head>

<body>

<?php
include("../config.php");
include("../session.php");

$id = $_GET['id'];

$sql = "DELETE FROM Customer_13022 WHERE ShopID = '$id'";

if($mysqli->query($sql) === TRUE) {
	header('location: table.php');
} else { echo "Error"; }
?>

</body>
</html>
