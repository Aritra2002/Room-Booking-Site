<!DOCTYPE html>

	<head>
		<title>Room Booked</title>
		<link rel="stylesheet" href="include/bootstrap.min.css">
		<center><img src='images/preview-web-banner-hotel-booking-template-design-1605702250.jpg' style='padding-bottom:0px'></center>
	
	<style>
		body{
			
			align-items: center;
			padding-bottom: 100px;
			background-color: #f5f5f5;
			margin: auto;
		}
		.form-signin{
				width: 100%;
				max-width: 330px;
				padding: 15px;
				margin: auto;
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
			session_start();
			include_once('db_con.php');
			$email = $_SESSION['email'];

			$sql = "SELECT * FROM queue";
			$sth = $dbh->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll(PDO::FETCH_OBJ);
			
			echo '<div class="c">';
			echo '<center><h1 class="h1 mb-3 font-weight-normal"> Queue </h1></center>';
			echo '<table class="c" border=1>';
			echo '<tr>';
			echo '<td>queue</td>';
			echo '<td>Email</td>';
			echo '<td>CheckIn Date</td>';
			echo '<td>CheckOut Date</td>';
			echo '<td>Room Type</td>';
			echo '</tr>';

			foreach($result as $value){
				echo "<tr>";
				echo "<td>".$value->queue."</td>";
				echo "<td>".$value->email."</td>";
				echo "<td>".$value->in_date."</td>";
				echo "<td>".$value->out_date."</td>";
				echo "<td>".$value->type."</td>";
				echo "<form method='POST' action='booked.php'>";
				echo "<td><button class='btn btn-sm btn-link btn-outline-primary' type='submit'> Confirm </button></td>";
				echo '<input type="hidden" name="email" value="'.$value->email.'" />';
				echo "</form>";
				echo "<form action='admin_cancel.php'>";
				echo "<td><button class='btn btn-sm btn-danger' type='submit'> Cancel </button></td>";
				echo "</form>";
				echo "</tr>";
				echo "</table>";
				echo '</div>';
			}
			
		?>
	</body>
</html>