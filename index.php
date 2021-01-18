<?php
session_start();
require_once "config.php";
//Connect to database
?>

<html>

<head>
    <title>STASYS - Login</title>
    <link href='https://fonts.googleapis.com/css?family=Comic Neue' rel='stylesheet'>
</head>

<style>
    body {
        background-color: powderblue;
    }

    h1 {
        font-family: 'Comic Neue';
    }

    table {
        font-family: 'Comic Neue';
    }

    button {
        background-color: white;
        color: black;
        border: 2px solid #555555;
    }
</style>

<body>
    <h1>STASYS - LOGIN</h1>

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
                    &nbsp;<button type="register" formaction="/register.php"><strong>Register</strong></button>
                </td>
            </tr>
        </table></br></br>
    </form>
</body>

</html>