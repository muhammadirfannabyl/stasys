<?php
	session_start();
	//Connect to database
	require_once "./sess/config.php";
?>
<html>
<head>
    <title>STASYS - Login</title>
    <link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
</head>

<body class="title">
    <div class="align-center">STASYS - LOGIN</div>
    <form method="post" action="./sess/login.php">
        <table>
            <tr>
                <td>User ID</td>
                <td><input type="text" placeholder="User ID" name="username" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" placeholder="Password" name="password" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <br><button type="submit" name="login"><p1>Log In</p1></button>
                    &nbsp;<button type="submit" name="register"><p1>Register</p1></button>
                </td>
            </tr>
        </table></br></br>
    </form>
</body>

</html> 
