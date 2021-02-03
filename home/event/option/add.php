<?php
	// ./root/home/event/option/add.php
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
			<a class="home" href="../../"><h1>STASYS</h1> Student Activity System v <?php echo $VERSION; ?></a>
			<a href="../../../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
				<a><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="../../user/"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
		</nav>
		<!--END: NAVBAR-->
		<div class="wrapper">
			<center><h1><strong>Add Event</strong></h1></center>
			<!--START: ADD EVENT FORM-->
				<form method="post" action="./post.php">
					<div class="input-group">
						<label>Title</label><br/>
						<input name="title" type="text" placeholder="Enter event title..." required/>
					</div>
					<div class="input-group">
						<div class="half">
							<label>Date</label><br/>
							<input name="date" type="date" required/>
						</div>
						<div class="half">
							<label>Time</label><br/>
							<input name="time" type="time" required/>
						</div><br/><br/>
						<div class="half">
							<label>Place</label><br/>
							<input name="place" type="text" placeholder="Enter event location..." required/>
						</div>
						<div class="half">
							<label>Quota</label><br/>
							<input name="quota" type="text" placeholder="Enter event quota..." required/>
						</div>
					</div>
					<div class="input-group">
						<label>Description</label><br/>
						<input name="info" type="text" placeholder="Enter event description..." required/>
					</div>

					<div class="action">
						<a href=""><button name="addevent" type="submit">&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;</button></a><a href="../../" required><input type="button" value="Cancel"/></a>
					</div>
				</form>
			<!--END: EVENT INFORMATION-->
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
	<?php include '../../../sess/footer.php';?>
</html>
