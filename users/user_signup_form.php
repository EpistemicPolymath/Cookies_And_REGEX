<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Registration</title>

    <!-- Framework CSS -->
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="../css/print.css" type="text/css" media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
</head>
<body>
<div class="container">
    <h1>Registration Form</h1>
    <hr>
    <div class="span-3">
        <br/>
    </div>
    <div class="span-18">
        <div class="error" style="display: none">
            Username already used, please use another username.
        </div>
        <div class="error" style="display: none">
            Username should contain 4-10 alphanumeric characters.
        </div>
        <div class="error">
            Should be at least 8 characters, 1 upper case letter [A-Z], one special character !,#,@.
        </div>
        <div class="error" style="display: none">
            Password and confirm password should match.
        </div>
        <div class="error" style="display: none">
            Age should be a number.
        </div>
        <div class="error" style="display: none">
            Please select a gender.
        </div>
        <div class="error" style="display: none">
            Please select a role.
        </div>
        <div class="error" style="display: none">
            Please enter the correct email format.
        </div>
        <div class="error" style="display: none">
            Please accept the terms.
        </div>
        <div class="error" style="display: none">
            Firstname and Lastname should only contain characters [A-Z] or [a-z]
        </div>
        <form id="dummy" action="signupHandler.php" method="post" class="inline">
            <fieldset>
                <div class="span-9">
                    <p>
                        <label for="username">Username</label><br>
                        <input type="text" class="text" id="username" name="username" value="">
                    </p>
                    <p>
                        <label for="password">Password</label><br>
                        <input type="password" class="text" id="password" name="password" value="">
                    </p>

                    <p>
                        <label for="firstname">Firstname</label><br>
                        <input type="text" class="text" id="firstname" name="firstname" value="">
                    </p>

                </div>

                <div class="span-8 last">
                    <p>
                        <label for="email">Email</label><br>
                        <input type="text" class="text" id="email" name="email" value="">
                    </p>

                    <p>
                        <label for="confirmpassword">Confirm Password</label><br>
                        <input type="password" class="text" id="confirmpassword" name="confirmpassword" value="">
                    </p>


                    <p>
                        <label for="lastname">Lastname</label><br>
                        <input type="text" class="text" id="lastname" name="lastname" value="">
                    </p>

                    <p>
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female"> Female<br>
                    </p>
                    <p>
                        <label>Role</label><br>
                        <input type="radio" name="gender" value="male"> Student
                        <input type="radio" name="gender" value="female"> Manager<br>
                    </p>
                    <p>
                        <label for="dept">Department</label><br>
                        <select id="dept" name="dept">
                            <option value="SIS">Engineering</option>
                            <option value="CS">CS</option>
                            <option value="BIO">BIO</option>
                            <option value="MIS">MIS</option>
                        </select>
                    </p>

                    <p>
                        <input type="checkbox" name="accepted" id="accepted" value="accepted"> Please check this
                        checkbox to accept our terms.
                    </p>

                    <p>
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </p>

                </div>

            </fieldset>
        </form>
    </div>
    <div class="span-3 last">
        <br/>
    </div>
</div>
</body>
</html>
