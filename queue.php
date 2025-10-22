<!DOCTYPE html>
<head>
<link rel="stylesheet" href="include/bootstrap.min.css">
<center><img src='images/preview-web-banner-hotel-booking-template-design-1605702250.jpg' style='padding-bottom:0px'></center>
<style>
	.bd-placeholder-img{
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-mox-user-select: none;
		-mox-user-select: none;
		user-select: none;
	}
	@media (min-width: 768px){
		.bd-placeholder-img-lg{
			font-size: 3.5rem;
		}
		}
	body{
		height: 100%;
	}
	body{
		align-items: center;
		padding-bottom: 40px;
		background-color: #f5f5f5;
	}		
	nav .navbar-nav li a{
		color: white;
	}
	.navbar-nav{
		margin-left: auto;
		margin-right: auto;
	}
	nav{
		top: auto;
		
	}
	.c{
		padding-top: 250px;
		padding-bottom: 100px;
	}
</style>
</head>
<nav class='navbar navbar-inverse navbar-expand-sm bg-dark'>
	<div class='container-fluid'>
		<ul class='navbar-nav nav-pills'>
					<li class='nav-item'><a class='nav-link' href='index.html'> Home </a></li>
					<li class='nav-item'><a class='nav-link active' href='userlogin.html'> User </a></li>
					<li class='nav-item'><a class='nav-link' href='adminlogin.html'> Admin </a></li>
				</ul>
	</div>
 </nav>
 </head>
<body>
	<?php
		session_start();
		include_once('db_con.php');
		$email = $_SESSION['email'];
		$checkin = $_POST['checkin'];
		$checkout = $_POST['checkout'];
		$roomtype = $_POST['roomtype'];

		$sql = "INSERT INTO queue (email, in_date, out_date, type) VALUES('$email', '$checkin', '$checkout', '$roomtype')";
		$sth = $dbh->prepare($sql);
		$sth->execute();

		echo "<center><h1>Booking under processing</h1></center>";
		echo "<center><h3>Waiting for conformation</h3></center>";
	?>
</body>
</html>