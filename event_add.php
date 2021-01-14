<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$sqluser = "SELECT * FROM user WHERE id ='".$_SESSION['id']."'";
	$query_user = $conn->query($sqluser);
	$rowuser = $query_user->fetch_assoc();
	
	if(isset($_POST['addevent'])){
		$name=$_POST['name'];
		$desc=$_POST['desc'];
		$date=$_POST['date'];
		$quota=$_POST['quota'];
		$datetime=date("Y/m/d H:i:s");
		$sql="INSERT INTO event (name, desc, when, quota, u_id) VALUES ('{$name}', '{$desc}', '{$date}', '{$quota}', '{$_SESSION['id']}')";

		$result=mysqli_query($conn,$sql);

		if($result){
			echo
			'Event has been successfully added to database.<br/>
			<a href="home.php">Home</a>
			';
		}
		else
			echo 'Event cannot be added due to entry error.';
	}
?>