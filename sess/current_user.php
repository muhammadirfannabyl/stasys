<?php
	//fetch info for current user
	$q = $conn->query("SELECT * FROM user WHERE id ='".$_SESSION['id']."'");
	$rowuser = $q->fetch_assoc();
?>