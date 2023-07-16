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
		margin-left: auto;
		margin-right: auto;
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
	
	$sql = 'SELECT email FROM queue WHERE email = "'.$email.'"';
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$result1 = $sth->fetchAll(PDO::FETCH_OBJ);
	
	$sql = 'SELECT booked.roomno, user.email, in_date, out_date, room.type FROM room,booked,user WHERE user.email = "'.$email.'" AND user.user_id = booked.user_id AND booked.roomno = room.roomno';
	$sth = $dbh->prepare($sql);
	$sth->execute();
	$result2 = $sth->fetchAll(PDO::FETCH_OBJ);
	//var_dump($result);
	if($result1){
		echo '<center><h1> Booking Pending... </h1></center>';
		echo "<form class='form-signin' action='user_cancel.php'>";
		echo "<button class='btn btn-lg btn-danger btn-block' type='submit'> Cancel </button>";
		echo '<input type="hidden" name="email" value="'.$email.'" />';
		echo "</form>";
	}
	elseif($result2){
		echo '<center><h1>Check Room Booking Status</h1></center>';
		echo '<table class="c" border=1>';
		echo '<tr>';
		echo '<td>Room No</td>';
		echo '<td>email</td>';
		echo '<td>Checkin Date</td>';
		echo '<td>CheckOut Date</td>';
		echo '<td>Room Type</td>';
		echo '</tr>';
	
		foreach($result2 as $value){
			echo '<tr>';
			echo '<td>'.$value->roomno.'</td>';
			echo '<td>'.$value->email.'</td>';
			echo '<td>'.$value->in_date.'</td>';
			echo '<td>'.$value->out_date.'</td>';
			echo '<td>'.$value->type.'</td>';
			echo '</tr>';
		}
		echo '</table>';
		echo "<form class='form-signin' action='user_cancel.php'>";
		echo "<button class='btn btn-lg btn-danger btn-block'> Cancel </button>";
		echo '<input type="hidden" name="email" value="'.$email.'" />';
		echo "</form>";
	}
	else{
		echo '<center><h1> No Booking Yet </h1></center>';
	}
?>
</body>