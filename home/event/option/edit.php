<?php
	include("../../../sess/config.php");
	require_once '../../../sess/session_check.php';
	require_once '../../../sess/current_user.php';
	
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
		<link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="../../../css/styles.css"/>
	</head>
	<body>
		<!--Navigation bar-->
		<nav class="align-center">
			<a class="title" href="../../">STASYS</a>
			Student Activity System v<?php echo $VERSION; ?>
			<a href="../../../user/"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
			<a href="./add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="../../../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--Form to add event-->
		<div class="box-base">
			<h1>Edit Event</h1>
			<form method="post" action="./post.php">
				<input type="hidden" name="no" value="<?php echo $_GET["no"]; ?>"/>
				<table>
					<tr><td>Title</td><td>: <input name="title" type="text" size="38" value="<?php echo $rowevent['title']; ?>"/></td></tr>
					<tr><td>Date</td><td>: <input name="date" type="date" value="<?php echo date('Y-m-d', strtotime($rowevent['date_time'])); ?>"/></td><tr>
					<tr><td>Time</td><td>: <input name="time" type="time" value="<?php echo date('H:i:s', strtotime($rowevent['date_time'])); ?>"/></td><tr>
					<tr><td>Place</td><td>: <input name="place" type="text" value="<?php echo $rowevent['location']; ?>"/></td><tr>
					<tr><td>Quota</td><td>: <input name="quota" type="text" size="5" value="<?php echo $rowevent['quota']; ?>"/></td></tr><tr></tr>
					<tr><td>Description</td><td>: <textarea name="info" class="static" rows="8" cols="40"><?php echo $rowevent['description']; ?></textarea></td></tr>
					<tr><td></td><td><button name="editevent" type="submit">Update</button><a href="../?no=<?php echo $_GET["no"]; ?>"><input type="button" value="Cancel"/></a></td></tr>
				</table>
			</form>
		</nav>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>