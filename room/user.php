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
		.form-signin input[type='date']{
			margin-bottom: 1px;
			border-bottom-right-radius: 0;
			border-bottom-left-radius: 0;
		}
		.form-signin input[type='radio']{
			margin-bottom: 10px;
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
	
	<body class='text-center'>
	<?php
                  		session_start();
		include_once('db_con.php');
		$email = $_POST['email'];
		$pwd = $_POST['pwd'];

		$sql = "SELECT user_name FROM user WHERE email = '".$email."' AND password = '".$pwd."' AND admin = 'N'";
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_OBJ);

		if($result){
			$_SESSION['email'] = $email;
			//echo "<div style='text-align: center; margin-top: 80px;'>";
			echo "<form class='form-signin' method='POST' action='queue.php'>";
			echo "<h1 class='h1 mb-3 font-weight-normal'> Welcome ".$result->user_name."</h1>";
			echo "<label for='checkin' class='sr-only'>Checkin Date</label>";
			echo "<input type='date' id='checkin' class='form-control' name='checkin' required/>";
			echo "<label for='checkout' class='sr-only'>Checkout Date</label>";
			echo "<input type='date'  id='checkout' class='form-control' name='checkout' required/><br>";
			echo "<h6><label for='rt'>Room Type: </label>";
			echo "<select id='rt' name='roomtype'>";
			echo "<option value='DB'>Double Bed (5000/Night)</option>";
			echo "<option value='SB' selected>Single Bed (2500/Night)</option>";
			echo "</select></h6><br>";
			echo "<button class='btn btn-lg btn-primary btn-block' type='submit' value='Submit'> Submit </button><br><br>";
			echo "<center><a href='user_status.php'>Check Booking Status</a></center>";
			echo "</form>";
		}
		else{
			echo "Password incorrect or User not found";
		}
	?>
	</body>
</html>