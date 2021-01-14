<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$sqluser = "SELECT * FROM user WHERE id ='".$_SESSION['id']."'";
	$query_user = $conn->query($sqluser);
	$rowuser = $query_user->fetch_assoc();
	
	$name=$_POST['name'];
	$desc=$_POST['desc'];
	$date=$_POST['date'];
	$quota=$_POST['quota'];

	$datetime=date("Y/m/d H:i:s");
	
	$sql="INSERT INTO event (name, desc, when, quota, u_id) VALUES ('{$name}', '{$desc}', '{$date}', '{$quota}', '{$_SESSION['id']}')";

	$result=mysqli_query($conn,$sql);

	if($result)
		echo
		'Event has been successfully added to database.<br/>
		<a href="home.php">Home</a>
		';
	else
		echo 'Event cannot be added due to entry error.';
?>
<html>
	<head><title>STASYS - Add Event</title>
	</head>
	<body>
		<!--Navigation bar-->
		<nav align="center" class="align-center">
			<h1>STASYS</h1>
			<a href="user_profile.php"><i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $rowuser['un']; ?></a>&nbsp;&nbsp;&nbsp;
			<i class="fa fa-calendar" aria-hidden="true"></i> Add Event&nbsp;&nbsp;&nbsp;
			<a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
		</nav>
		<nav>
			<form>
				<table name="addevent" method="post" action="#">
					<tr><td>Name</td><td>: <input name="name" type="text"/></tr>
					<tr><td>Description</td><td>: <input name="desc" type="text"/></tr>
					<tr><td>Date and Time</td><td>: <input name="desc" type="datetime-local"/>
					<tr><td>Quota</td><td>: <input name="quota" type="text"/></tr></tr>
				</table>
				<button type="submit">Submit</button><a href="home.php"><input type="button" value="Cancel"/></a>
			</form>
		<nav>
	</body>
</html>