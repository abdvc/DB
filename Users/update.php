
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

$sql = "SELECT * FROM User_13022 WHERE ID='$id'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();


if($_POST){
	$usr = $_POST['Username'];
	$pass = $_POST['Password'];
	$spid = $_POST['SalespersonID'];

	$sql = "UPDATE User_13022 SET Username='$usr', Password='$pass', SalespersonID='$spid' WHERE ID={$id}";

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
	<p>SalespersonID: <br>
	<input type='text' name='SalespersonID' value="<?php echo $row['SalespersonID'] ?>"><br></p>
	<p><input type="submit" class="btn btn-primary" value="Save Changes"></p>
	<p><input type='button' value='Back' onclick='location.href="table.php"'/></p>
</form></div>

</body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<style>
navbar {
	font-family: verdana;
    height: 100%;
}
</style>
</html>


