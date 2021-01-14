<?php
	include("config.php");

	require_once 'session_check.php';

	//fetch info for current  user 
	$user_id = $_SESSION['u_id'];
	$sqluser = "SELECT * FROM user WHERE u_id ='$user_id'";
	$query_user = $conn->query($sqluser);
	
	$rowuser =$query_user->fetch_assoc();
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
			<a href="user_page.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
			<a href="event_page.php"><i class="fa fa-calendar" aria-hidden="true"></i> Events</a>
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--List existing events from Database-->
		<div>
			<h1>Events</h1>
			<div class="box-event">
				<b>Partyyy</b><br/><br/>
				26/02/2021<br/><br/>
				0/150 Joined
				<input type="button" style="float: right" value="View"/>
			</div>
			<div class="box-event">
				<b>Semester Break Dinner</b><br/><br/>
				25/01/2021<br/><br/>
				-FULL-
				<input type="button" style="float: right" value="View"/>
			</div>
			<div class="box-event">
				<b>Semester Break Camp</b><br/><br/>
				25/01/2021<br/><br/>
				0/50 Joined
				<input type="button" style="float: right" value="View"/>
			</div>
			<div class="box-event">
				<b>MAT263 Assessment 2</b><br/><br/>
				15/01/2021<br/><br/>
				0/30 Joined
				<input type="button" style="float: right" value="View"/>
			</div>
		</div>
		
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>