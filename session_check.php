<?php
	session_start();

	if(!isset($_SESSION['user_id'])){
		echo "<script src='js/sweetalert.min.js'></script>";
		echo "<script>setTimeout(function(){ swal({title: 'Please Log In!', icon: 'warning'}).then(function() {window.location = 'index.php';}); }, 1);</script>";
	}
?>