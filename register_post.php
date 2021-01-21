<html>
	<body>
		<h1>User Registration</h1>
		<form action = "register_post.php" method="post">
			<table>
				<tr>
					<td>Enter Username</td>
					<td><input type="text" name="username" /></td>
				</tr>
				<tr>
					<td>Enter Password</td>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td>Enter Matrics ID</td>
					<td><input type="text" name="mat_id" /></td>
				</tr>
				<tr>
					<td>Enter Full Name</td>
					<td><input type="text" name="name" /></td>
				</tr>
				<tr>
					<td>Enter Program</td>
					<td><input type="text" name="program" /></td>
				</tr>
				<tr>
					<td>Enter Part</td>
					<td><input type="number" name="part" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><br><button type="submit" name="Submit">Submit</button></td>
				</tr>
			</table>
		</form>
	</body>
</html>


<?php
	include("config.php");
	
	if(isset($_POST['Submit'])){
	$un = $_POST['username'];
	$pw = $_POST['password'];
	$mat_id = $_POST['mat_id'];
	$name = $_POST['name'];
	$prog = $_POST['program'];
	$part = $_POST['part'];
	$created=date('Y-m-d H:i:s');	
	$sql="INSERT INTO user (un,pw,mat_id,name,prog,part,created)
	VALUES('$un','$pw','$mat_id','$name','$prog','$part','$created')";
	
	$result=mysqli_query($conn,$sql);
	if($result)
	{echo "Registered Successfully!";}
	else
	{die(mysql_error());}
	}
?>