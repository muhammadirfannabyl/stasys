<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$uid = $_SESSION['id'];
	$sqluser = "SELECT * FROM user WHERE id ='".$_SESSION['id']."'";
	$query_user = $conn->query($sqluser);
	$rowuser = $query_user->fetch_assoc();
	
	if(isset($_POST['addevent'])){
		$name=$_POST['name'];
		$desc=$_POST['desc'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$quota=$_POST['quota'];
		$date->setTime($time->format('H'), $time->format('i'), $time->format('s'));
		$datetime =  $date->format('Y-m-d H:i:s');
		$sql="INSERT INTO event (name, desc, when, quota, u_id) VALUES ('{$name}', '{$desc}', '{$datetime}', '{$quota}', '{$uid}')";

		$result=mysqli_query($conn,$sql);

		if($result){
			echo '
			<script>
				alert("'.$date.' Entry has been added into the database.");
				window.location = "home.php";
			</script>
			';
		}
		else{
			echo '
			<script>
				alert("'.$date.' Cannot add entry into the database.");
				window.location = "event.php";
			</script>
			';
		}
	}
	else{
		echo '
		<script>
			alert("Sum thing is wong here.");
		</script>
		';
	}
?>