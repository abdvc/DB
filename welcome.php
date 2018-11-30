<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome!</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
   include('session.php');
?>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="welcome.php" title="Homepage">My Paint shop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="Users/table.php">Users<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Salesperson/table.php">Salespersons</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Customer/table.php">Customers</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " href="Product/table.php">Product</a>
                    </li>
		    <li class="nav-item">
                      <a class="nav-link " href="Survey/survey.php">Survey</a>
                    </li>
		    <li class="nav-item">
                      <a class="nav-link " href="dashboard.php">Dashboard</a>
                    </li>

		    
                  </ul></div>
			<div align='right'><form action='logout.php' align='right'>
			<input type="submit" value="Logout">
		    </form></div>
                
</nav>

	





<!-- 
<div class='container'>

        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />

        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
        <input type="button" class="btn btn-success" value="Put Your Text Here" 
        onclick="window.location.href='http://www.hyperlinkcode.com/button-links.php'" />
    </div> -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   
</body>
<style>
body,html {
	font-family: verdana;
    height: 100%;
    background-image: url('paint.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}
.btn{
    opacity: 0.5 !important;
}
</style>


</html>



