<html>

<head><title>Item deleted</title></head>

<body>

<?php
include("../config.php");
include("../session.php");

$id = $_GET['id'];

$sql = "DELETE FROM Product_13022 WHERE PCode = '$id'";

if($mysqli->query($sql) === TRUE) {
	echo "<div align='center'>";
	echo "<h3>Record deleted</h3>";
	echo "<a href='table.php'><button type='button'>Back</button></a>";
	echo "</div>";
} else { echo "Error"; }
?>

</body>
</html>
