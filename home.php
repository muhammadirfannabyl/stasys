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
		<title>STASYS - Home</title>
		<link rel="stylesheet" type="text/css" href="styles.css"/>
	</head>
	<body>
		<!--Navigation bar-->
		<nav align="center" class="align-center">
			<a href="home.php"><h1>STASYS</h1></a>
			<p>Student Activity System v0.1</p>
			<a href="user_profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>&nbsp;&nbsp;&nbsp;
			<a href="event.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>&nbsp;&nbsp;&nbsp;
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--List existing events from Database-->
		<div>
			<h1>Events</h1>
		<?php
			$result = mysqli_query($conn, "SELECT * FROM event ORDER BY id DESC");
			while($rows=mysqli_fetch_array($result)){ ?>
	<div class="box-event">
				<b><?php echo $rows['title']; ?></b><br/><br/>
				<? echo $rows['date_time']; ?><br/><br/>
				0/<? echo $rows['quota']; ?> joined
				<input type="button" style="float: right" value="View"/>
			</div>
		<?php } ?>
</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>