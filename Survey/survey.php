<html>
<head><title>Survey</title></head>
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

<div align='center'>
<form action="survey.php" method='post' enctype="multipart/form-data">
	<p>Shop Name: <br>
	<input type='text' name='shopname'></p>
	<p><input type='checkbox' name='check1' value='y'>	Are my products available in shop?<br></p>
	<p><input type='checkbox' name='check2' value='y'>	Are my products positioned in front<br></p>
	<p><input type='checkbox' name='check3' value='y'>	Are competitor products more prominent<br></p>
	<p>Select image to upload: <br>
	<input type='file' name='image'></p>
	<p><input type="submit" class="btn btn-primary" value="Submit">
	<input type='button' value='Back' onclick='location.href="../welcome.php"' /></p>
</form>
</div>

<?php
include('../session.php');

$conn = new MongoDB\Driver\Manager("mongodb://localhost:27017");

$bulk = new MongoDB\Driver\BulkWrite;

if ($_POST) {
	if (isset($_POST['check1']) && $_POST['check1'] == 'y') {
		$c1 = $_POST['check1'];
	} else {
		$c1 = 'n';
	}
	if (isset($_POST['check2']) && $_POST['check2'] == 'y') {
		$c2 = $_POST['check2'];
	} else {
		$c2 = 'n';
	}
	if (isset($_POST['check3']) && $_POST['check3'] == 'y') {
		$c3 = $_POST['check3'];
	} else {
		$c3 = 'n';
	}

	if (isset($_FILES['image'])) {
		if (move_uploaded_file($_FILES['image']['tmp_name'], "upload/".$_FILES['image']['name'])){
			$img = $_FILES['image']['name'];
			echo "Upload successful";
		} else {
			echo "Upload unsuccessful";
		}
	} else {
		echo "File not found";
		echo '<pre>';
        	print_r($_FILES);
		print_r($_POST);
        	echo '</pre>';
	}

	$bulk->insert(['ShopName' => $_POST['shopname'], 'Check1' => $c1, 'Check2' => $c2, 'Check3' => $c3, 'Image' => $img, 'CreatedOn' => new MongoDB\BSON\UTCDateTime]);

	
	$conn->executeBulkWrite('Paints.Survey', $bulk);
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</body>
</html>
