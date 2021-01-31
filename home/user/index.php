<?php
	include('../../sess/config.php');
	require_once '../../sess/session_check.php';
	include('../../sess/current_user.php');
?>
<html>
	<head>
		<title>STASYS - User</title>
		<link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
	</head>
	<body>
		<!--STA Navigation bar-->
		<nav class="align-center">
			<a class="title" href="../">STASYS</a>
			Student Activity System v<?php echo $VERSION; ?>
			<a><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
			<a href="../event/option/add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="../../sess/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<!--END Navigation bar-->
		<!--Display user information-->
		<div class="box-base">
			<h1>User Profile</h1>
			<table>
				<tr><td><b>Name</b></td><td>: <?php echo $rowuser['name']; ?></td></tr>
				<tr><td><b>Matrices ID</b></td><td>: <?php echo $rowuser['mat_id']; ?></td></tr>
				<tr><td><b>Programme</b></td><td>: <?php echo $rowuser['prog']; ?></td></tr>
				<tr><td><b>Part</b></td><td>: <?php echo $rowuser['part']; ?></td></tr>
				<tr><td><b>Date Registered</b></td><td>: <?php echo $rowuser['created']; ?></td></tr>
				<?php
				    $result2 = mysqli_query($conn, "SELECT * FROM position WHERE id =".$rowuser['access_lvl']."");
				    $rows2 = $result2->fetch_assoc();
				?>
				<tr><td><b>Access Level</b></td><td>: <?php echo $rows2['title']; ?></td></tr>
			</table>
		</div><br/><br/><br/>
		<!--STA Display event that this user joined-->
		<div class="box-base">
			<h1>Joined Event</h1>
			<?php $result = mysqli_query($conn, "SELECT e_id, title, date_time FROM event JOIN participation on event.id=participation.e_id WHERE participation.u_id = '".$rowuser['id']."' ORDER BY date_time DESC");
			while($rows=mysqli_fetch_array($result)){ ?>
				<div class="text"><?php echo $rows['title']; ?></div>
				<div class="text"><?php echo date('h:i A (Hi), d/m/Y', strtotime($rows['date_time'])); ?><a href="../event/?no=<?php echo $rows['e_id']; ?>"><input type="button" value="View"/></a></div>
			<?php } ?>
		</div>
		<!--END Display event that this user joined-->
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>
