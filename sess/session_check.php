<?php
	session_start();
	if(!isset($_SESSION['id'])){
		echo "<script>alert('Session invalid! Please log in again.'); window.location = '../index.php'; </script>";
	}
?>