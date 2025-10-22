<!DOCTYPE html>

	<head>
		<title>Update Room Status</title>
		<link rel="stylesheet" href="include/bootstrap.min.css">
		<center><img src='images/preview-web-banner-hotel-booking-template-design-1605702250.jpg' style='padding-bottom:0px'></center>
	
	<style>
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

			$roomno = $_POST['roomno'];
			$sql = "SELECT * FROM room WHERE roomno = '".$roomno."'";
			$sth = $dbh->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_OBJ);

			echo '<form method="POST" class="form-signin" action="update_process.php">';
			echo '<label><h5>Room No</label></h5>';
			echo '<input type="text" class="form-control" id="Room" name="roomno" value="'.$roomno.'" readonly/>';
			echo '<label><h5>Room Availability(Y/N)</label></h5>';
			echo '<input type="text" id="inputAvaliability" class="form-control" name="avaliability" value="'.$result[0]->avaliability.'"/><br>';
			echo '<button type="submit" class="btn btn-lg btn-primary btn-block"> Submit </button>';
			echo '</form>';
		?>
	</body>
</html>