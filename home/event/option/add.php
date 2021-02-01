<?php
	include("../../../sess/config.php");
	require_once '../../../sess/session_check.php';
	require_once '../../../sess/current_user.php';
?>
<html>
	<!--START: PAGE HEADER-->
	<head>
		<title>STASYS - Event</title>
		<link href="https://fonts.googleapis.com/css?family=Comic Neue" rel='stylesheet'/>
		<link rel="stylesheet" type="text/css" href="../../../css/styles-new.css"/>
	</head>
	<!--END: PAGE HEADER-->
	<body>
		<!--START: NAVBAR-->
		<nav>
			<a href="../../"><h1>STASYS</h1> Student Activity System v <?php echo $VERSION; ?></a>
			<a href="../../../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
				<a><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="../../user/"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
		</nav>
		<!--END: NAVBAR-->
		<!--Form to add event-->
		<div class="box-base">
			<h1>Add Event</h1>
			<form method="post" action="./post.php">
				<table>
					<tr><td>Title</td><td>: <input name="title" type="text" size="38" required/></td></tr>
					<tr><td>Date</td><td>: <input name="date" type="date" required/></td><tr>
					<tr><td>Time</td><td>: <input name="time" type="time" required/></td><tr>
					<tr><td>Place</td><td>: <input name="place" type="text" required/></td><tr>
					<tr><td>Quota</td><td>: <input name="quota" type="text" size="5" required/></td></tr><tr></tr>
					<tr><td>Description</td><td>: <textarea name="info" class="static" rows="8" cols="40" required></textarea></td></tr>
					<tr><td></td><td><button name="addevent" type="submit">Submit</button><a href="../../" required><input type="button" value="Cancel"/></a></td></tr>
				</table>
			</form>
		</nav>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>
