<?php
	require_once "../sess/config.php";
	require_once '../sess/session_check.php';
	include('../sess/current_user.php');
	
	$status = "";
?>
<html>
	<head>
		<title>STASYS - Home</title>
		<link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
	</head>
	<body>
		<!--Navigation bar-->
		<nav class="align-center">
			<a class="title" href="./">STASYS</a>
			Student Activity System v<?php echo $VERSION; ?>
			<a href="./user/"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
			<a href="./event/option/add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--List existing events from database-->
		<div class="box-base">
			<h1>Events</h1><?php
				if ($rowuser['access_lvl'] == 3)
					$result = mysqli_query($conn, "SELECT * FROM event WHERE status = 1 ORDER BY date_time DESC");
				else
					$result = mysqli_query($conn, "SELECT * FROM event ORDER BY date_time DESC");
				
				while($rows=mysqli_fetch_array($result)){
				    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(u_id) as count FROM participation WHERE e_id = ".$rows['id'].""));
					if ($rows['status'] == 0)
						$status = "<div style='color: #7f4600;'>Approval Pending";
					else
						$status = "<div style='color: darkgreen;'>Approved"; ?>
				    <div class="box-event">
					<!--b><?php // echo $rows['id']; ?></b><br/><br/-->
					<div class="text"><b><?php echo $rows['title']; ?></b><?php echo $status; ?></div></div>
					<div class="text"><?php echo date('h:i A (Hi), d/m/Y', strtotime($rows['date_time'])); ?></div>
					<div class="text"><?php echo $count['count'].' participant(s) joined'; ?><a href="event/?no=<?php echo $rows['id']; ?>"><input type="button" value="View"/></a></div>
				    </div><?php
				} ?>
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>
