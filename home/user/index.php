<?php
	// ./root/home/user/index.php
	include('../../sess/config.php');
	require_once '../../sess/session_check.php';
	include('../../sess/current_user.php');

	$q = mysqli_query($conn, "SELECT * FROM position WHERE id =".$rowuser['access_lvl']."");
	$pos = $q->fetch_assoc();
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
			<a  class="home" href="../"><h1>STASYS</h1> Student Activity System v <?php echo $VERSION; ?></a>
			<a href="../../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
				<a href="../event/option/add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
		</nav>
		<!--END: NAVBAR-->
		<div class="wrapper">
			<center>
				<h1><strong>User Information</strong></h1>
				<!--START: User information-->
				<table class="user">
					<tr>
						<th>Name</th>
						<td>: <?php echo $rowuser['name']; ?></td>
					</tr>
					<tr>
						<th>Matrices ID</th>
						<td>: <?php echo $rowuser['mat_id']; ?></td>
					</tr>
					<tr>
						<th>Programme</th>
						<td>: <?php echo $rowuser['prog']; ?></td>
					</tr>
					<tr>
						<th>Part</th>
						<td>: <?php echo $rowuser['part']; ?></td>
					</tr>
					<tr>
						<th>Date Registered</th>
						<td>: <?php echo date('d/m/Y', strtotime($rowuser['created'])); ?></td>
					</tr>
					<tr>
						<th>Access Level</th>
						<td>: <?php echo $pos['title']; ?></td>
					</tr>
				</table>
				<!--END: User information-->
			</center>
			<center><h1><strong>Joined Event</strong></h1></center>
			<!--START: List joined event -->
			<?php $q2 = mysqli_query($conn, "SELECT e_id, title, date_time FROM event JOIN participation on event.id=participation.e_id WHERE participation.u_id = '".$rowuser['id']."' ORDER BY date_time DESC");
			while($event=mysqli_fetch_array($q2)){ ?>
			<a href="../event/?no=<?php echo $event['e_id']; ?>">
			<div class="event-bg">
				<div class="txt2"><strong><?php echo $event['title']; ?></strong></div>
				<div class="txt2"><?php echo date('h:i A (Hi), d/m/Y', strtotime($event['date_time'])); ?></div>
			</div></a><?php
			} ?>
			<!--END: List joined event -->
			<!--START: LIST CREATED EVENT-->
			<center><h1><strong>Organised Event</strong></h1></center>
			<?php $q2 = mysqli_query($conn, "SELECT id, title, date_time FROM event WHERE u_id = ".$rowuser['id']." ORDER BY date_time DESC");
			while($event=mysqli_fetch_array($q2)){ ?>
			<a href="../event/?no=<?php echo $event['id']; ?>">
			<div class="event-bg">
				<div class="txt2"><strong><?php echo $event['title']; ?></strong></div>
				<div class="txt2"><?php echo date('h:i A (Hi), d/m/Y', strtotime($event['date_time'])); ?></div>
			</div></a><?php
			} ?>
			<!--END: LIST CREATED EVENT-->
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
	<?php include '../../sess/footer.php';?>
</html>
