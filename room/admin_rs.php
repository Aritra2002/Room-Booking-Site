	<head>
		<title>Room Status</title>
		<link rel="stylesheet" href="include/bootstrap.min.css">
		<center><img src='images/preview-web-banner-hotel-booking-template-design-1605702250.jpg' style='padding-bottom:0px'></center>
<style>
	body{
			align-items: center;
			padding-bottom: 100px;
			background-color: #f5f5f5;
			margin: auto;
		}	nav .navbar-nav li a{
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
	.form-signin{
				width: 100%;
				max-width: 330px;
				padding: 15px;
				margin: auto;
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
	require('db_con.php');

	if(isset($_SESSION['email'])){
		$sql = "SELECT * FROM room";
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_OBJ); 
		
		echo '<center><h1 class="h1 mb-3 font-weight-normal"> Room </h1></center>';
		echo "<table class='c' border=1>";
		echo "<tr>";
		echo "<td>Room No</td>";
		echo "<td>Room Type</td>";
		echo "<td>Availability</td>";
		//echo "<td>CheckOut Date</td>";
		//echo "<td>Room Type</td>";
		echo "</tr>";
		
		foreach($result as $value){
			echo "<tr>";
			echo "<td>".$value->roomno."</td>";
			echo "<td>".$value->type."</td>";
			echo "<td>".$value->avaliability."</td>";
			//echo "<td>".$value->out_date."</td>";
			//echo "<td>".$value->type."</td>";
			echo "<form method='POST' action='update_room.php'>";
			echo "<td><Button type='submit' class='btn btn-sm btn-link btn-outline-primary'> Update </button></td>";
			echo '<input type="hidden" name="roomno" value="'.$value->roomno.'" />';
			//echo '<input type="hidden" name="type" value="'.$value->type.'" />';
			echo "</form>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<div class='c'>";
		echo "<form method='POST' class='form-signin' action='add_room.php'>";
		echo "<input type='submit' class='btn btn-sm btn-light btn-outline-secondary' value='Add'/>";
		echo "</form>";
		echo '</div>';
	}
	?>
</body>
</html>