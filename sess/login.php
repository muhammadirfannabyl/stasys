<?php
	session_start();
	require_once "config.php";

	if(isset($_POST['login']))	{
		//post user id and password
		$un = mysqli_real_escape_string($conn, $_POST['username1']);
		$pw = mysqli_real_escape_string($conn, $_POST['password1']);

		//query to find user
		$sql = "SELECT * FROM user WHERE un = '$un' AND pw = '$pw'";
		$query = $conn->query($sql);
		$row=$query->fetch_assoc();

		//check if user exists
		if($query->num_rows > 0){
			$_SESSION['id'] = $row['id'];
			echo '<script> alert("You have successfully log in. You will be redirected to the home page."); window.location = "../home/"; </script>';
		}
		else
			echo '<script> alert("Incorrect username or password! Please try again."); window.location = "../index.php"; </script>';
	}
	else if(isset($_POST['register']))
		header('location: register.php');
?>
