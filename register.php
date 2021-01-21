<html>
    <body>
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
                <td><input type="text" class="form-control" name="username" id="studentID" required="required" maxlength="50"></td>
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
