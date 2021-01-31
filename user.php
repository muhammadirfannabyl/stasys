<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$query_user = $conn->query("SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$rowuser = $query_user->fetch_assoc();
?>
<html>
	<head>
		<title>STASYS - Profile</title>
		<link rel="stylesheet" type="text/css" href="./styles.css"/>
	</head>
	<body>
		<!--STA Navigation bar-->
		<nav class="align-center">
			<a class="title" href="home.php">STASYS</a>
			Student Activity System v0.2
			<a><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>
			<a href="event_add.php"><i class="fa fa-calendar" aria-hidden="true"></i> Add Event</a>
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
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
                <tr><td><b>Access Level</b></td><td>: <?php echo $rowuser['access_lvl']; ?></td></tr>
                <tr><td><b>Access Level</b></td><td>: 
                <script>
                    var access_lvl = parseInt($rowuser['access_lvl']);
                    if (access_lvl == 1) document.write("Developers");
                    if (access_lvl == 2) document.write("Admin");
                    if (access_lvl == 3) document.write("User");
                </script>
                </td></tr>
			</table>
		</div><br/><br/><br/>
		<!--STA Display event that this user joined-->
		<div class="box-base">
			<h1>Joined Event</h1>
			<?php $result = mysqli_query($conn, "SELECT e_id, title, date_time FROM event JOIN participation on event.id=participation.e_id WHERE participation.u_id = '".$rowuser['id']."' ORDER BY date_time DESC");
			while($rows=mysqli_fetch_array($result)){ ?>
				<div class="text"><?php echo $rows['title']; ?></div>
				<div class="text"><?php echo $rows['date_time']; ?><a href="event.php?no=<?php echo $rows['e_id']; ?>"><input type="button" value="View"/></a></div>
			<?php } ?>
		</div>
		<!--END Display event that this user joined-->
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
</html>
