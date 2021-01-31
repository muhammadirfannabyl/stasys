<?php
	session_start();
	require_once "config.php";
	//Connect to database
?>

<html>
<body>

  <form name="form1" method="post" action="login.php">
  <table>
                    <tr>
                        <td>User Name</td>
                        <td><input type="text" placeholder="Username" name="username" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" placeholder="Password" name="password" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br><button type="submit" name="Submit" ><strong>Login</strong></button>
						&nbsp;<button type="submit" name="register" ><strong>Register</strong></button>
                        </td>
                    </tr>
               </table></br></br>

</body>

</html>
