<?php
	include("config.php");
	
	require_once 'session_check.php';
	
	//fetch info for current  user
	$query_user = $conn->query("SELECT * FROM user WHERE id=".$_SESSION['id']."");
	$rowuser = $query_user->fetch_assoc();
	
	// Add event function definition
	if(isset($_POST['addevent'])){
		$title=$_POST['title'];
		$info=$_POST['info'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$location=$_POST['place'];
		$quota=$_POST['quota'];
		$date_time=date('Y-m-d H:i:s', strtotime("$date $time"));
		
		// Insert value into database
		$result=mysqli_query($conn,"INSERT INTO event (title, description, date_time, location, quota, u_id) VALUES ('{$title}', '{$info}', '{$date_time}', '{$location}', '{$quota}', '".$_SESSION['id']."')");
		if($result){
			$nid = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id) as id FROM event"));
			echo '<script>alert("SUCCESS: Event has been added successfully."); window.location = "event.php?no='.$nid['id'].'"; </script>';
		}
		else
			echo '<script>alert("FAIL: Event cannot be added."); window.location = "event.php?no='.$_GET['no'].'"; </script>';
	}elseif(isset($_GET['option']))
		// Leave event function definition
		if($_GET['option'] == "leave"){
			$result=mysqli_query($conn, "DELETE FROM participation WHERE u_id=".$_SESSION['id']." AND e_id=".$_GET['no']."");
			echo '<script>alert("SUCCESS: You have left this event."); window.location = "event.php?no='.$_GET['no'].'"; </script>';
		// Join event function definition
		}elseif($_GET['option'] == "join"){
			if (isset($_GET["no"])){
				$query_event = $conn->query("SELECT * FROM event WHERE id =".$_GET["no"]."");
				$rowevent = $query_event->fetch_assoc();
				//query to check if user joined this event
				$query0 = mysqli_query($conn, "SELECT * FROM participation WHERE u_id = ".$rowuser['id']." AND e_id = ".$rowevent['id']."");
				if(mysqli_num_rows($query0) > 0)
					echo '<script>alert("FAIL: You have already joined this event!"); window.location = "home.php"; </script>';
				else{
					// Current total participant
					$count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(u_id) as count FROM participation WHERE e_id = ".$_GET["no"].""));
					// Check if there the event is not full
					if ($count['count'] > $rowevent['quota'] - 1)
						echo '<script>alert("FAIL: You cannot join this full event!"); window.location = "event.php?no='.$rowevent["id"].'"; </script>';
					else{
						$result=mysqli_query($conn,"INSERT INTO participation (u_id, e_id) VALUES ('".$rowuser['id']."', '".$rowevent["id"]."')");
						if($result)
							echo '<script>alert("SUCCESS: Welcome to the event."); window.location = "event.php?no='.$rowevent["id"].'"; </script>';
						else
							echo '<script>alert("FAIL: Cannot join this event due to server error."); window.location = "event.php?no='.$rowevent["id"].'"; </script>';
					}
				}
			}
			echo '<script>alert("SUCCESS: You have joined this event."); window.location = "event.php?no='.$_GET['no'].'"; </script>';
		}
	else
		echo '<script>alert("FAIL: Request cannot be accepted."); window.location = "event.php?no='.$_GET['no'].'"; </script>';
	
	// Join and leave event function definition
	
?>
