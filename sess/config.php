<?php
	$conn = new mysqli("localhost","u726414194_stasy", "Qwer1234", "u726414194_stasys");
	$VERSION = 0.7;
	if($conn->connect_error)
		die("Connection failed: " .$conn->connect_error);
?>