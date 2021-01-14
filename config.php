<?php
	$conn = new mysqli("localhost","u726414194_stasy", "qwer1234", "u726414194_stasys");
	if($conn->connect_error){
		die("Connection failed: " .$conn->connect_error);
	}
?>
