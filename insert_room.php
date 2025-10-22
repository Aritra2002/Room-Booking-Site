<!DOCTYPE html>

	<head>
		<title>Room Added</title>
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
			include_once('db_con.php');
			$roomno = $_POST['roomno'];
			$type = $_POST['type'];
			$avaliability = $_POST['avaliability'];
			try{
				$sql = "INSERT INTO room VALUES ('$roomno', '$type', '$avaliability')";
				//$dbh->beginTransaction();
				$sth = $dbh->prepare($sql);
				$sth->execute();
				//$dbh->commit();
			}catch(PDOException $e){
				echo $e->getmessage();
			}

			echo '<center><h1 class="h1 mb-3 font-weight-normal"> Item inserted </h1></center>';
			echo '<form class="form-signin" action="admin_rs.php">';
			echo '<button class="btn btn-lg btn-success btn-block" type="submit"> Result </button>';
			echo '</form>';
		?>
	</body>
	
</html>