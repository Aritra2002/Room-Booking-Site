<!DOCTYPE html>

	<head>
		<title>Add New Room</title>
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
		.form-signin{
			width: 100%;
			max-width: 350px;
			padding: 15px;
			margin: auto;
		}
		.form-signin .form-control{
			position: relative;
			box-sizing: border-box;
			hight: auto;
			padding: 10px;
			font-size: 16px;
		}
		.form-signin .form-control:focus{
			z-index: 2;
		}
		.form-signin input[type='text']{
			margin-bottom: 1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
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
	</style>
	<nav class='navbar navbar-inverse navbar-expand-sm bg-dark'>
	<div class='container-fluid'>
		<ul class='navbar-nav nav-pills'>
					<li class='nav-item'><a class='nav-link' href='index.html'> Home </a></li>
					<li class='nav-item'><a class='nav-link' href='userlogin.html'> User </a></li>
					<li class='nav-item'><a class='nav-link active' href='adminlogin.html'> Admin </a></li>
				</ul>
	</div>
 </nav>
	</head>
	<body>
		<?php
			include('db_con.php');
			echo '<form method="POST" class="form-signin" action="insert_room.php">';
			echo "<center><h1 class='h1 mb-3 font-weight-normal'> Add New Room </h1></center>";
			echo "<label for='inputRoom' class='sr-only'>Room No</label>";
			echo '<input type="text" id="inputRoom" name="roomno" class="form-control" placeholder="Room No" required/>';
			echo "<label for='inputType' class='sr-only'>Room No</label>";
			echo '<input type="text" id="inputType" class="form-control" name="type" placeholder="Room Type" required/>';
			echo "<label for='inputAvailability' class='sr-only'>Room No</label>";
			echo '<input type="text" id="inputAvailability" class="form-control" name="avaliability" placeholder="Availability" required/><br>';
			echo '<button type="submit" class="btn btn-lg btn-primary btn-block"> Submit </button>';
			echo '</form>';
		?>
	</body>
</html>