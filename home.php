<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$sqluser = "SELECT * FROM user WHERE id ='".$_SESSION['id']."'";
	$query_user = $conn->query($sqluser);
	
	$rowuser = $query_user->fetch_assoc();
?>
<html>
	<style>
	*{
		background-color: #ffffff00;
		box-sizing: border-box;
		font-family: 'Arial';
		margin-left: 0;
		margin-right: 0;
		margin-top: 0;
		scroll-behavior: smooth;
	}nav a{
		color: darkgreen;
		text-decoration: none;
	}.align-center{
		width: 50%;
		margin: auto;
	}.box-event{
		background-color: lightgray;
		padding: 20px 10px 20px 10px;
		margin: 20px auto 20px auto;
		width: 960px;
	}.vis{
		border: 2px dashed red;
	}
	</style>
	<head>
		<title>STASYS - Home</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<!--Navigation bar-->
		<nav align="center" class="align-center">
			<h1>STASYS</h1>
			<a href="user_profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>&nbsp;&nbsp;&nbsp;
			<a href="event_add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>&nbsp;&nbsp;&nbsp;
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--List existing events from Database-->
		<div>
			<h1>Events</h1>
		<?php
			$result = mysqli_query($conn, "SELECT * FROM event ORDER BY id DESC");
			while($rows=mysqli_fetch_array($result)){ ?>
	<div class="box-event">
				<b><?php echo $rows['name']; ?></b><br/><br/>
				<? echo $rows['when']; ?><br/><br/>
				0/30 Joined
				<input type="button" style="float: right" value="View"/>
			</div>
		<?php } ?>
</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>