<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$query_user = $conn->query("SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$rowuser = $query_user->fetch_assoc();
	
	if (isset($_GET["no"])){
		$query_event = $conn->query("SELECT * FROM event WHERE id =".$_GET["no"]."");
		$rowevent = $query_event->fetch_assoc();
		
		//query to check if user joined this event
		$query0 = mysqli_query($conn, "SELECT * FROM participation WHERE u_id = ".$rowuser['id']." AND e_id = ".$rowevent['id']."");
		
		if(mysqli_num_rows($query0) > 0)
			echo '<script>alert("FAIL: You have already joined this event!"); window.location = "home.php"; </script>';
		else{
			$count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(u_id) as count FROM participation WHERE e_id = ".$_GET["no"]."")); // Current total participant
			//echo '<script>alert('.$count['count'].')</script>';
			if ($count['count'] > $rowevent['quota'])
				echo '<script>alert("FAIL: You cannot join this full event!"); window.location = "home.php"; </script>';
			else{
				$result=mysqli_query($conn,"INSERT INTO participation (u_id, e_id) VALUES ('".$rowuser['id']."', '".$rowevent["id"]."')");

				if($result)
					echo '<script>alert("SUCCESS: Welcome to the event."); window.location = "event.php?no='.$rowevent["id"].'"; </script>';
				else
					echo '<script>alert("FAIL: Cannot join this event due to server error."); window.location = "home.php"; </script>';
			}
		}
	}
?>