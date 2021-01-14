<html>
    <body>
        <h1>STASYS - REGISTER</h1>

        <form method='post' action='register.php'>

            <div class="form-group">
                <label for="lname">User Name:</label>
                <input type="text" class="form-control" name="username" id="username" required="required" maxlength="80">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" name="email" id="email" required="required" maxlength="80">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80">
            </div>
            <div class="form-group">
                <label for="pwd">Confirm Password:</label>
                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" onkeyup='' required="required" maxlength="80">
            </div>

            <button type="submit" name="btnsignup" class="btn btn-default">Submit</button>
        </form>
    </body>
</html>