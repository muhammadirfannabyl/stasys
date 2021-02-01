<?php
	// ./root/home/index.php
	require_once "../sess/config.php";
	require_once '../sess/session_check.php';
	include('../sess/current_user.php');
?>
<!DOCTYPE html>
<html>
	<!--START: PAGE HEADER-->
	<head>
		<title>STASYS - Home</title>
		<link href="https://fonts.googleapis.com/css?family=Comic Neue" rel='stylesheet'/>
		<link rel="stylesheet" type="text/css" href="../css/styles-new.css"/>
	</head>
	<!--END: PAGE HEADER-->
	<body>
		<!--START: NAVBAR-->
		<nav>
			<a class="home" href="./"><h1>STASYS</h1> Student Activity System v <?php echo $VERSION; ?></a>
			<a href="../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
				<a href="./event/option/add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="./user/"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
		</nav>
		<!--END: NAVBAR-->
		<!--START: BODY-->
		<div class="wrapper">
			<center><h1><strong>Events</strong></h1></center>
			<!--START: LIST AVAILABLE EVENT-->
				<?php if ($rowuser['access_lvl'] == 3)
					$result = mysqli_query($conn, "SELECT * FROM event WHERE status = 1 ORDER BY date_time DESC");
				else
					$result = mysqli_query($conn, "SELECT * FROM event ORDER BY date_time DESC");
				
				while($rows=mysqli_fetch_array($result)){
				    $count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(u_id) as count FROM participation WHERE e_id = ".$rows['id'].""));
					
					$participant = mysqli_query($conn, "SELECT * FROM participation WHERE u_id = ".$rowuser['id']." AND e_id = ".$rows['id']."");
					
					if(mysqli_num_rows($participant) > 0){
						if($count['count'] == 1)
							$count_str = "You joined.";
						elseif(mysqli_num_rows($participant) > 0 && $count['count'] == 2)
							$count_str = "You and another participant joined.";
						else
							$count_str = "You and ".($count['count']-1)." other participants joined.";
					}else{
						if ($count['count'] == 0)
							$count_str = "Nobody participated yet";
						elseif($count['count'] == 1)
							$count_str = "1 participant joined";
						else
							$count_str = $count['count']." participants joined";
					}
						
					if ($rows['status'] == 0)
						$status = "<div style='color: #7f4600;'>Approval Pending <i class='fa fa-exclamation' aria-hidden='true'></i></div>";
					else
						$status = "<div style='color: darkgreen;'>Approved <i class='fa fa-check' aria-hidden='true'></i></div>"; ?>
			
			<div class="event-bg">
				<div class="txt"><h1><?php echo $rows['title']; ?></h1><?php echo $status; ?></div>
				<div class="txt"><?php echo date('h:i A (Hi), d/m/Y', strtotime($rows['date_time'])); ?></div>
				<div class="txt"><?php echo $count_str; ?></div>
				<a href="./event/?no=<?php echo $rows['id']; ?>"><div class="button">View</div></a>
			</div><?php
				}?>
			
			<!--END: LIST AVAILABLE EVENT-->
		</div>
		<!--END: BODY-->
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
	
</html>