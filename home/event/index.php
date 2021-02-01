<?php
	// ./root/home/event/index.php
	include("../../sess/config.php");
	require_once '../../sess/session_check.php';
	require_once '../../sess/current_user.php';
	
	// Get Event ID from previous button
	if (isset($_GET["no"])){
		$query_event = $conn->query("SELECT * FROM event WHERE id =".$_GET["no"]."");
		$rowevent = $query_event->fetch_assoc();
	}
	
	// Get organiser info
	$query_org = $conn->query("SELECT * FROM user WHERE id = ".$rowevent['u_id']."");
	$roworg = $query_org->fetch_assoc();
	
	$count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(u_id) as count FROM participation WHERE e_id = ".$rowevent["id"].""));
?>
<html>
	<!--START: PAGE HEADER-->
	<head>
		<title>STASYS - User</title>
		<link href="https://fonts.googleapis.com/css?family=Comic Neue" rel='stylesheet'/>
		<link rel="stylesheet" type="text/css" href="../../css/styles-new.css"/>
	</head>
	<!--END: PAGE HEADER-->
	<body>
		<!--START: NAVBAR-->
		<nav>
			<a href="../"><h1>STASYS</h1> Student Activity System v <?php echo $VERSION; ?></a>
			<a href="../../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
				<a href="../event/option/add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="../user/"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
		</nav>
		<!--END: NAVBAR-->
		<div class="wrapper">
			<center><h1><strong>Event Information</strong></h1>
			<!--START: EVENT INFORMATION-->
			<table class="user">
				<tr>
					<th>Title</th>
					<td>: <?php echo $rowevent['title']; ?></td>
				</tr>
				<tr>
					<th>Date &#38; Time</th>
					<td>: <?php echo date('h:i A (Hi), d/m/Y', strtotime($rowevent['date_time'])); ?></td>
				</tr>
				<tr>
					<th>Place</th>
					<td>: <?php echo $rowevent['location']; ?></td>
				</tr>
				<tr>
					<th>Quota</th>
					<td>: <?php echo $rowevent['quota']; ?></td>
				</tr>
				<tr>
					<th>Organiser</th>
					<td>: <?php echo $roworg['name']; ?></td>
				</tr>
				<tr>
					<th>Description</th>
					<td>: <?php echo $rowevent['description']; ?></td>
				</tr>
			</table></center>
			<!--END: EVENT INFORMATION-->
			<!--START: EVENT BUTTON-->
			<div class="action">
				<?php $q2 = $conn->query("SELECT * FROM participation WHERE u_id=".$_SESSION['id']." and e_id=".$_GET["no"]."");
					$hasJoined=$q2->fetch_assoc();
				
				if($rowuser['access_lvl'] < 3 && $rowevent['status']==0)
					echo '<a href="./option/post.php?no='.$rowevent['id'].'&option=approve"><input type="button" value="Approve"/></a>';
				else{
					// If user has joined the event
					if($hasJoined)
						echo '<a href="./option/post.php?no='.$rowevent['id'].'&option=leave"><input class="action" type="button" value="Leave"/></a>';
					else
						echo '<a href="./option/post.php?no='.$rowevent['id'].'&option=join"><input type="button" value="Join"/></a>';

					// Checks whether user is admin above or event owner
					if($rowuser['access_lvl'] < 3 || $rowuser['id'] == $rowevent['u_id'])
						echo '<a href="./option/edit.php?no='.$rowevent['id'].'"><input type="button" value="Edit"/></a>';
				}
				// Checks if user is admin above or event owner
				if($rowuser['access_lvl'] < 3 || $rowuser['id'] == $rowevent['u_id'])
					echo '<a href="./option/post.php?no='.$rowevent['id'].'&option=delete"><input type="button" value="Delete"/></a>';
				?>
			</div>
			<!--END: EVENT BUTTON-->
			<!--START: PARTICIPANT LIST-->
			<div class="wrapper">
				<center><h1><strong>Participant List</strong></h1></center>
				<ol>
					<?php $result = mysqli_query($conn, "SELECT * FROM participation WHERE e_id = ".$rowevent['id']."");
					if ($count['count'] > 0){
						while($rows=mysqli_fetch_array($result)){
							$participant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM user WHERE id = ".$rows['u_id']."")); ?><li><?php echo $participant['name']; ?></li>
					<?php } ?>
			
				</ol><?php 
					}else
						echo 'Nobody has joined this event yet. Become the first one to participate!'; ?>
			<!--END: PARTICIPANT LIST-->
			</div>
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>
