<!DOCTYPE html>

	<head>
		<title>Room Booked</title>
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
	.c{
		margin-left: auto;
		margin-right: auto;
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
		$email = $_POST['email'];
		$sql = "SELECT user_id FROM user WHERE email = '".$email."'";
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_OBJ);
		$id = $result->user_id;

		$sql = "SELECT * FROM queue WHERE email = '".$email."'";
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_OBJ);
		$in_date = $result->in_date;
		$out_date = $result->out_date;
		$type = $result->type;
		//var_dump($in_date);

		$sql = "SELECT roomno FROM room WHERE avaliability = 'Y' AND type = '".$type."'";
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetch(PDO::FETCH_OBJ);
		$roomno = $result->roomno;
		//var_dump($roomno);
		$sql = "INSERT INTO booked (roomno, user_id, in_date, out_date) VALUES ('$roomno', '$id', '$in_date', '$out_date')";
		//echo $sql3;
		//die;
		//$dbh->beginTransaction();
		$sth = $dbh->prepare($sql);
		$sth->execute();
		//$dbh->commit();

		$sql = "DELETE FROM queue WHERE email = '$email'";
		$sth = $dbh->prepare($sql);
		$sth->execute();

		echo "<center><h1 class='h1 mb-3 font-weight-normal'> Booking Confirmed </h1></center>";
		echo "<form class='form-signin' action='admin_br.php'>";
		echo "<button class='btn btn-lg btn-success btn-block' type='submit'> Check Booked Rooms </button>";
		echo "</form>";
	?>
	</body>
</html>