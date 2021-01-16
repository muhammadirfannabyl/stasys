<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current user
	$query_user = $conn->query("SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$rowuser = $query_user->fetch_assoc();
?>
<html>
	<head>
		<title>STASYS - Add Event</title>
		<link rel="stylesheet" type="text/css" href="./styles.css"/>
	</head>
	<body>
		<!--Navigation bar-->
		<nav align="center" class="align-center">
			<a href="home.php"><h1>STASYS</h1></a>
			<p>Student Activity System v0.1</p>
			<a href="user.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>&nbsp;&nbsp;&nbsp;
			<i class="fa fa-calendar" aria-hidden="true"></i> Add Event&nbsp;&nbsp;&nbsp;
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--Navigation bar-->
		<div class="box-base">
			<h1>Add Event</h1>
			<form id="event" method="post" action="event_add_post.php">
				<table>
					<tr><td>Title</td><td>: <input name="title" type="text" size="38"/></td></tr>
					<tr><td>Description</td><td>: <textarea name="info" class="static" rows="8" cols="40"></textarea></td></tr>
					<tr><td>Date</td><td>: <input name="date" type="date"/></td><tr>
					<tr><td>Time</td><td>: <input name="time" type="time"/></td><tr>
					<tr><td>Quota</td><td>: <input name="quota" type="text" size="5"/></td></tr><tr></tr>
				</table>
				<button name="addevent" type="submit">Submit</button>&nbsp;<a href="home.php"><input type="button" value="Cancel"/></a>
			</form>
		</nav>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>