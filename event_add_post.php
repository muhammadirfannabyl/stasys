<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$query_user = $conn->query("SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$rowuser = $query_user->fetch_assoc();
	
	if(isset($_POST['addevent'])){
		$title=$_POST['title'];
		$info=$_POST['info'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$quota=$_POST['quota'];
		$date_time=date('Y-m-d H:i:s', strtotime("$date $time"));
		$sql="INSERT INTO event (title, description, date_time, quota, u_id) VALUES ('{$title}', '{$info}', '{$date_time}', '{$quota}', '{$uid}')";

		$result=mysqli_query($conn,$sql);

		if($result)
			echo '<script>alert("SUCCESS: Event has been added successfully."); window.location = "home.php"; </script>';
		else
			echo '<script>alert("FAIL: Event cannot be added."); window.location = "event.php"; </script>';
	}else
		echo '<script>alert("FAIL: Form cannot be submitted."); window.location = "event.php"; </script>';
?>