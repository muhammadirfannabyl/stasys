<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current user
	$query_user = $conn->query("SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$rowuser = $query_user->fetch_assoc();
	
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
	<head>
		<title>STASYS - Event: <?php echo $rowevent['title']; ?></title>
		<link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="./styles.css"/>
	</head>
	<body>
		<!--STA Navigation bar-->
		<nav class="align-center">
			<a class="title" href="home.php">STASYS</a>
			Student Activity System v<?php echo $VERSION; ?>
			<a href="user.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
			<a><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--END Navigation bar-->
		<!--Display event information-->
		<div class="box-base">
			<h1>Event Information</h1>
			<table>
				<tr><td><b>Title</b></td><td>: <?php echo $rowevent['title']; ?></td></tr></td></tr>
				<tr><td><b>Date &#38; Time</b></td><td>: <?php echo $rowevent['date_time']; ?></td></tr></td></tr>
				<tr><td><b>Place</b></td><td>: <?php echo $rowevent['location']; ?></td></tr></td></tr>
				<tr><td><b>Quota</b></td><td>: <?php echo $rowevent['quota']; ?></td></tr></td></tr>
				<tr><td><b>Organizer</b></td><td>: <?php echo $roworg['name']; ?></td></tr></td></tr>
				<tr><td><b>Description</b></td><td>: <?php echo $rowevent['description']; ?></td></tr></td></tr>
				<tr><td></td><td>
				<?php
					// Check whether user has joined this event
					$query2 = $conn->query("SELECT * FROM participation WHERE u_id=".$_SESSION['id']." and e_id=".$_GET["no"]."");
					$delevt=$query2->fetch_assoc();
					
					// If user is admin and the event status is 0 (unapproved)
					if($rowuser['access_lvl'] < 3 && $rowevent['status']==0)
						echo '<a href="event_post.php?no='.$rowevent['id'].'&option=approve"><input type="button" value="Approve"/></a>';
					else{
						// If user has joined the event
						if($delevt)
							echo '<a href="event_post.php?no='.$rowevent['id'].'&option=leave"><input type="button" value="Leave"/></a>';
						else
							echo '<a href="event_post.php?no='.$rowevent['id'].'&option=join"><input type="button" value="Join"/></a>';
						
						// Checks whether user is admin above or event owner
						if($rowuser['access_lvl'] < 3 || $rowuser['id'] == $rowevent['u_id'])
							echo '<a href="event_edit.php?no='.$rowevent['id'].'"><input type="button" value="Edit"/></a>';
					}
					// Checks if user is admin above or event owner
					if($rowuser['access_lvl'] < 3 || $rowuser['id'] == $rowevent['u_id'])
						echo '<a href="event_post.php?no='.$rowevent['id'].'&option=delete"><input type="button" value="Delete"/></a>';
				?>
				</td></tr>
			</table><br/><br/><br/>
			<!--List participant who joined this event-->
			<h1>Participants</h1>
			<ol>
			<?php $result = mysqli_query($conn, "SELECT * FROM participation WHERE e_id = ".$rowevent['id']."");
			if ($count['count'] > 0){
				while($rows=mysqli_fetch_array($result)){
					$participant = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name FROM user WHERE id = ".$rows['u_id']."")); ?>
	<li><?php echo $participant['name']; ?></li>
			<?php } ?></ol><?php
			}else
				echo 'Nobody has joined this event yet. Become the first one to participate!';?>
		
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>
