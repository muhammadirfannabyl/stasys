<?php
	session_start();
	require_once "config.php";
	
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
		 echo "1";
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

		 //$success_message = "Account created successfully.";
		echo "<script src='js/sweetalert.min.js'></script>";
        echo "<script>setTimeout(function(){ swal({title: 'Success!', icon: 'success'}).then(function() {window.location = 'index.php';}); }, 1);</script>";
        
	   }
	}
?>

<html>
    <body>
    <?php 
        // Display Error message
        if(!empty($error_message)){
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> <?= $error_message ?>
        </div>

        <?php
        }
        ?>

        <?php 
        // Display Success message
        if(!empty($success_message)){
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?= $success_message ?>
        </div>

        <?php
        }
		?>

        <h1>STASYS - REGISTER</h1>

        <form method='post' action='register.php'>
        <table>
            <tr>
                <td>User Name</td>
                <td><input type="text" class="form-control" name="username" id="username" required="required" maxlength="50"></td>
            </tr>

            <tr>
                <td>Name</td>
                <td><input type="text" class="form-control" name="name" id="name" required="required" maxlength="50"></td>
            </tr>
            
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="password" id="password" required="required" maxlength="50"></td>
            </tr>
            
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required="required" maxlength="80"></td>
            </tr>
            
            <tr>
                <td>Student ID</td>
                <td><input type="text" class="form-control" name="studentid" id="studentID" required="required" maxlength="50"></td>
            </tr>
            
            <tr>
                <td>Program</td>
                <td><input type="text" class="form-control" name="program" id="program" required="required" maxlength="50"></td>
            </tr>
            
            <tr>
                <td>Part</td>
                <td><input type="text" class="form-control" name="part" id="part" required="required" maxlength="50"></td>
            </tr>
            
            <tr>
                <td></td>
                <td>
                    <br><button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
                    &nbsp;<a href="index.php"><input type="button" value="Cancel"/></a>
                </td>
            </tr>
            
        </form>
    </body>
</html>
