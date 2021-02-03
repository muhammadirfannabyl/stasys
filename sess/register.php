<?php
	session_start();
	require_once "./config.php";
	
	$error_message = "";$success_message = "";

	// Register user
	if(isset($_POST['btnsignup'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $confirmpassword = trim($_POST['confirmpassword']);
        $name = trim($_POST['name']);
        $studentid = trim($_POST['studentid']);
        $program = trim($_POST['program']);
        $part = trim($_POST['part']);

	   $isValid = true;

	   // Check fields are empty or not
        if($username == '' || $password == '' || $confirmpassword == '' || $name == '' || $studentid == '' || $program == '' || $part == ''){
            $isValid = false;
            $error_message = "Please fill all fields."; 
        }

        // Check if confirm password matching or not
        if($isValid && ($password != $confirmpassword) ){
            $isValid = false;
            $error_message = "Confirm password not matching";
        }

        if($isValid){

            // Check if Username already exists
            $stmt = $conn->prepare("SELECT * FROM user WHERE un = ?");
            //echo "1";
            $stmt->bind_param("s", $username);
            //echo "1";
            $stmt->execute();
            //echo "1";
            $result = $stmt->get_result();
            //echo "1";
            $stmt->close();
            //echo "1";
            if($result->num_rows > 0){
                //echo "1";
                $isValid = false;
                //echo "1";
                $error_message = "Username is already existed.";
            }

        }

        // Insert records
        if($isValid){
            //echo "1";
            $insertSQL = "INSERT INTO user(un,pw,mat_id,name,prog,part) values(?,?,?,?,?,?)";
            //echo "1";
            $stmt = $conn->prepare($insertSQL);
            //echo "1";
            $stmt->bind_param("ssssss",$username,$password,$studentid,$name,$program,$part);
            //echo "1";
            $stmt->execute();
            //echo "1";
            $stmt->close();

            if($insertSQL)
                echo '<script>alert("SUCCESS: User has been registered successfully."); window.location = "../index.php"; </script>';
            else
                echo '<script>alert("FAIL: User cannot be registered."); window.location = "./register.php"; </script>';

        }
    }
    // Display Error message
    if(!empty($error_message)){
        echo '<script>alert("'.$error_message.'"); window.location = "./register.php"; </script>';
	    $error_message = "";
    }
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
			<center><a class="home" href="../"><h1>STASYS</h1> Student Activity System v <?php echo $VERSION; ?></a></center>
		</nav>
		<!--END: NAVBAR-->
		<div class="wrapper">
			<center><h1><strong>User Registration</strong></h1></center>
			<!--START: REGISTER FORM-->
				<form method="post" action="./register.php">
					<div class="input-group">
						<label>User ID</label><br/>
						<input name="username" type="text" placeholder="Enter name for login..." required/>
					</div>
					<div class="input-group">
						<div class="half">
							<label>Password</label><br/>
							<input name="password" type="password" placeholder="Enter password for login..." required/>
						</div>
						<div class="half">
							<label>Confirm Password</label><br/>
							<input name="confirmpassword" type="password" placeholder="Enter same password for confirmation..." required/>
						</div><br/><br/>
					</div>
					<div class="input-group">
						<label>Full Name</label><br/>
						<input name="name" type="text" placeholder="Enter full name..." required/>
					</div>
					<div class="input-group">
						<label>Student ID</label><br/>
						<input name="studentid" type="text" placeholder="Enter matrices ID..." required/>
					</div>
					<div class="input-group">
						<div class="half">
							<label>Program</label><br/>
							<input name="program" type="text" placeholder="Enter study programme..." required/>
						</div>
						<div class="half">
							<label>Part</label><br/>
							<input name="part" type="text" placeholder="Enter current semester..." required/>
						</div><br/><br/>
					</div>

					<div class="action">
						<a href=""><button name="btnsignup" type="submit">&nbsp;&nbsp;&nbsp;Submit&nbsp;&nbsp;&nbsp;</button></a><a href="../"><input type="button" value="Cancel"/></a>
					</div>
				</form>
			<!--END: REGISTER FORM-->
		</div>
		<script src="https://kit.fontawesome.com/2ba9e2652f.js" crossorigin="anonymous"></script>
	</body>
	<?php include 'footer.php';?>
</html>
