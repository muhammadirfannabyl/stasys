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
		$date_time=date('Y-m-d H:i:s', "$date $time");
		$sql="INSERT INTO event (title, info, date_time, quota, u_id) VALUES ('{$name}', '{$desc}', '{$quota}', '{$date_time}', '{$uid}')";

		$result=mysqli_query($conn,$sql);

		if($result){
			echo '
			<script>
				alert("'.$datetime.' Entry has been added into the database.");
				window.location = "home.php";
			</script>
			';
		}
		else{
			echo '
			<script>
				alert("'.$datetime.' Cannot add entry into the database.\nError: '.$name.', '.$desc.', '.$date.', '.$time.', '.$datetime.', '.$quota.' ");
				window.location = "event.php";
			</script>
			';
		}
	}
	else{
		echo '
		<script>
			alert("'.$datetime.' Sum thing is wong here.");
		</script>
		';
	}
?>