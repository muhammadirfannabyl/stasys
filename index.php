<?php
session_start();
require_once "config.php";
//Connect to database
?>
<html>
<head>
    <title>STASYS - Login</title>
    <link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="./styles.css"/>
</head>

<body class="title">
    <div class="align-center">STASYS - LOGIN</div>
    <form name="form1" method="post" action="login.php">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" placeholder="Username" name="username" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" placeholder="Password" name="password" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <br><button type="submit" name="Submit"><strong>Login</strong></button>
                    &nbsp;<button type="register" formaction="/register.php"><p1>Register</p1></button>
                </td>
            </tr>
        </table></br></br>
    </form>
</body>

</html> 
