<?php
	$conn = new mysqli("localhost","root", "", "mylogbook");
	if($conn->connect_error){
		die("Connection failed: " .$conn->connect_error);
	}
?>