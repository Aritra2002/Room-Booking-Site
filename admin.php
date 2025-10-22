<!DOCTYPE html>

	<head>
		<title>Admin</title>
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
			max-width: 330px;
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
		</style>
		
	</head>
	
	
	
	<body>
		<nav class='navbar navbar-inverse navbar-expand-sm bg-dark'>
			<div class='container-fluid'>
				<ul class='navbar-nav nav-pills'>
					<li class='nav-item'><a class='nav-link' href='index.html'> Home </a></li>
					<li class='nav-item'><a class='nav-link' href='userlogin.html'> User </a></li>
					<li class='nav-item'><a class='nav-link active' href='adminlogin.html'> Admin </a></li>
				</ul>
			</div>
		</nav>
	<body>
		<?php
			session_start();
			include_once('db_con.php');
			$email = $_POST['email'];
			$pwd = $_POST['pwd'];

			$sql = "SELECT user_name FROM user WHERE email = '".$email."' AND password = '".$pwd."' AND admin = 'Y'";
			$sth = $dbh->prepare($sql);
			$sth->execute();
			$result = $sth->fetch(PDO::FETCH_OBJ);

			if($result){
				$_SESSION['email'] = $email;
				echo "<center><h1 class='h1 mb-3 font-weight-normal'> Welcome ".$result->user_name."</h1></center>";
				echo "<form class='form-signin' action='cq.php'>";
				echo "<button class='btn btn-lg btn-primary btn-block' type='submit'> Check Queue </button>";
				echo "</form>";
				echo "<form class='form-signin' action='admin_rs.php'>";
				echo "<button class='btn btn-lg btn-secondary btn-block' type='submit'> Check Room Status </button>";
				echo "</form>";
				echo "<form class='form-signin' action='admin_br.php'>";
				echo "<button class='btn btn-lg btn-info btn-block' type='submit'> Check Booked Rooms </button>";
				echo "</form>";
			}
			else{
				echo "Password incorrect or User not found";
			}
		?>
	</body>
</html>