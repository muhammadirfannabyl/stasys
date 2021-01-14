<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$sqluser = "SELECT * FROM user WHERE id ='".$_SESSION['id']."'";
	$query_user = $conn->query($sqluser);
	$rowuser = $query_user->fetch_assoc();
?>
<html>
	<head><title>STASYS - Add Event</title>
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
	<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<!--Navigation bar-->
		<nav align="center" class="align-center">
			<h1>STASYS</h1>
			<a href="user_profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>&nbsp;&nbsp;&nbsp;
			<i class="fa fa-calendar" aria-hidden="true"></i> Add Event&nbsp;&nbsp;&nbsp;
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<nav>
			<form>
				<table name="addevent" method="post" action="event_add.php">
					<tr><td>Name</td><td>: <input name="name" type="text"/></tr>
					<tr><td>Description</td><td>: <input name="desc" type="text"/></tr>
					<tr><td>Date and Time</td><td>: <input name="date" type="datetime-local"/>
					<tr><td>Quota</td><td>: <input name="quota" type="text"/></tr></tr>
				</table>
				<button type="submit">Submit</button><a href="home.php"><input type="button" value="Cancel"/></a>
			</form>
		</nav>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>