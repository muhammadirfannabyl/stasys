<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$sqluser = "SELECT * FROM user WHERE id ='".$_SESSION['id']."'";
	$query_user = $conn->query($sqluser);
	
	$rowuser = $query_user->fetch_assoc();
?>
<html>
	<head>
		<title>STASYS - Profile</title>
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<!--Navigation bar-->
		<nav align="center" class="align-center">
			<a href="home.php"><h1>STASYS</h1></a>
			<p>Student Activity System v0.1</p>
			<i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?>&nbsp;&nbsp;&nbsp;
			<a href="event.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>&nbsp;&nbsp;&nbsp;
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--List existing events from Database-->
		<div>
			<h1>User Profile</h1>
			<table>
				<tr><td><b>Name</b></td><td>: <?php echo $rowuser['name']; ?></td></tr>
				<tr><td><b>Matrices ID</b></td><td>: <?php echo $rowuser['mat_id']; ?></td></tr>
				<tr><td><b>Programme</b></td><td>: <?php echo $rowuser['prog']; ?></td></tr>
				<tr><td><b>Part</b></td><td>: <?php echo $rowuser['part']; ?></td></tr>
				<tr><td><b>Date Registered</b></td><td>: <?php echo $rowuser['created']; ?></td></tr>
			</table>
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>