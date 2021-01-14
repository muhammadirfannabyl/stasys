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
		$sql="INSERT INTO event (name, desc, when, quota, u_id) VALUES ('{$name}', '{$desc}', '{$date}', '{$quota}', '{$_SESSION['id']}')";

		$result=mysqli_query($conn,$sql);

		if($result){
			echo '
			<script>
				alent("Entry has been added into the database.");
				window.location = "home.php";
			</script>
			';
		}
		else{
			echo '
			<script>
				alent("Cannot add entry into the database.");
			</script>
			';
		}
	}
?>