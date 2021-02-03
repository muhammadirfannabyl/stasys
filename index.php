<?php
	session_start();
	//Connect to database
	require_once "./sess/config.php";
?>
<html>
	<!--START: PAGE HEADER-->
	<head>
		<title>STASYS - Login</title>
		<link href="https://fonts.googleapis.com/css?family=Comic Neue" rel='stylesheet'/>
		<link rel="stylesheet" type="text/css" href="../../../css/styles-new.css"/>
	</head>
	<!--END: PAGE HEADER-->
	<body>
		<!--START: NAVBAR-->
		<nav>
			<center><a class="home" href="./"><h1>STASYS</h1> Student Activity System v <?php echo $VERSION; ?></a></center>
		</nav>
		<!--END: NAVBAR-->
		<div class="wrapper">
			<center><h1><strong>Log In</strong></h1></center>
			<!--START: ADD EVENT FORM-->
				<form method="post" action="./sess/login.php">
					<div class="input-group">
						<div class="half">
							<div class="wrapper">
								<label>User ID</label><br/>
								<input name="username" type="text" placeholder="Enter user ID..."/>
							</div>
						</div>
						<div class="half">
							<div class="wrapper">
								<label>Password</label><br/>
								<input name="password" type="password" placeholder="Enter password..."/>
							</div>
						</div><br/><br/>
					</div>
					<div class="action">
						<a href=""><button name="login" type="submit" value="Login">&nbsp;&nbsp;&nbsp;Login&nbsp;&nbsp;&nbsp;</button></a><a href="../../" required><button name="register" type="submit" value="Login">&nbsp;&nbsp;Register&nbsp;&nbsp;</button></a><a href="../../" required></a>
					</div>
				</form>
			<!--END: EVENT INFORMATION-->
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
	<?php include './sess/footer.php';?>
</html>
