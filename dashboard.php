<?php
include('session.php');
include('config.php');

?>

<html>
  <head>
    <title>Dashboard</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     11],
          ['Eat',      2],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: 'My Daily Activities',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>
  </head>
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <div id="donutchart" style="width: 900px; height: 500px;"></div>
  </body>
</html>
