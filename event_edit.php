<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current user
	$query_user = $conn->query("SELECT * FROM user WHERE id =".$_SESSION['id']."");
	$rowuser = $query_user->fetch_assoc();
	
	// Get Event ID from previous button
	if (isset($_GET["no"])){
		$query_event = $conn->query("SELECT * FROM event WHERE id =".$_GET["no"]."");
		$rowevent = $query_event->fetch_assoc();
	}
		
	$query_org = $conn->query("SELECT * FROM user WHERE id = ".$rowevent['u_id']."");
	$roworg = $query_org->fetch_assoc();
?>
<html>
	<head>
		<title>STASYS - Add Event</title>
		<link rel="stylesheet" type="text/css" href="./styles.css"/>
	</head>
	<body>
		<!--Navigation bar-->
		<nav class="align-center">
			<a class="title" href="home.php">STASYS</a>
			Student Activity System v0.2
			<a href="user.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
			<a href="event_add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--Form to add event-->
		<div class="box-base">
			<h1>Edit Event</h1>
			<form method="post" action="event_post.php">
				<input type="hidden" name="no" value="<?php echo $_GET["no"]; ?>"/>
				<table>
					<tr><td>Title</td><td>: <input name="title" type="text" size="38" value="<?php echo $rowevent['title']; ?>"/></td></tr>
					<tr><td>Date</td><td>: <input name="date" type="date" value="<?php echo date('Y-m-d', strtotime($rowevent['date_time'])); ?>"/></td><tr>
					<tr><td>Time</td><td>: <input name="time" type="time" value="<?php echo date('H:i:s', strtotime($rowevent['date_time'])); ?>"/></td><tr>
					<tr><td>Place</td><td>: <input name="place" type="text" value="<?php echo $rowevent['location']; ?>"/></td><tr>
					<tr><td>Quota</td><td>: <input name="quota" type="text" size="5" value="<?php echo $rowevent['quota']; ?>"/></td></tr><tr></tr>
					<tr><td>Description</td><td>: <textarea name="info" class="static" rows="8" cols="40"><?php echo $rowevent['description']; ?></textarea></td></tr>
					<tr><td></td><td><button name="editevent" type="submit">Update</button><a href="event.php?no=<?php echo $_GET["no"]; ?>"><input type="button" value="Cancel"/></a></td></tr>
				</table>
			</form>
		</nav>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>