<?php

require_once "config.php";
session_start();

if(isset($_POST['Submit']))
{
    //post user id and password
    $un = mysqli_real_escape_string($conn, $_POST['username']);
    $pw = mysqli_real_escape_string($conn, $_POST['password']);


    //query to find user
    $sql = "SELECT * FROM user WHERE un = '$un' AND pw = '$pw'";
    $query = $conn->query($sql);
    $row=$query->fetch_assoc();

    //check if user exists
    if($query->num_rows > 0)
	{
	    
	    $_SESSION['id'] = $row['id'];

		header('location: home.php');
		
	}
	else
	{
	    echo "<script src='js/sweetalert.min.js'></script>";
	    echo "<script>setTimeout(function(){ swal({title: 'The username or password is incorrect!', 
		icon: 'warning',timer: 3000}).then(function() {window.location = 'index.php';}); }, 1);</script>";
	}
}
else if(isset($_POST['register']))
{
	header('location: register.php');
}
?>
