<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$query_user = $conn->query("SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$rowuser = $query_user->fetch_assoc();
?>
<html>
	<head>
		<title>STASYS - Home</title>
		<link rel="stylesheet" type="text/css" href="./styles.css"/>
		<style>
		</style>
	</head>
	<body>
		<!--Navigation bar-->
		<nav class="align-center">
			<a href="home.php"><h1>STASYS</h1></a>
			<p>Student Activity System v0.2</p>
			<a href="user.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>&nbsp;&nbsp;&nbsp;
			<a href="event_add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>&nbsp;&nbsp;&nbsp;
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--List existing events from database-->
		<div class="box-base">
			<h1>Events</h1>
			<?php $result = mysqli_query($conn, "SELECT * FROM event ORDER BY date_time DESC");
			while($rows=mysqli_fetch_array($result)){
			$count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(u_id) as count FROM participation WHERE e_id = ".$rows['id']."")); ?>
	<div class="box-event">
				<!--b><?php // echo $rows['id']; ?></b><br/><br/-->
				<div class="text"><b><?php echo $rows['title']; ?></b></div>
				<div class="text"><?php echo $rows['date_time']; ?></div>
				<div class="text"><?php echo $count['count'].' participant(s) joined'; ?><a href="event.php?no=<?php echo $rows['id']; ?>"><input type="button" value="View"/></a></div>
			</div>
		<?php } ?>
</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>
