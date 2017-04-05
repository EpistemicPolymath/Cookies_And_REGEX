<?php

require_once("../db_error/database.php");
#Populate All Department Names

$queryAllDepartments = $db->prepare("SELECT * 
                        FROM department");
$queryAllDepartments->execute();
$departments = $queryAllDepartments->fetchall();
$queryAllDepartments->closecursor();

?>

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

        <?php if (isset($_GET["error"])) : ?>
            <?php switch ($_GET['error']) {
                case 1: ?>
                    <!-- Error 1 -->
                    <div class="error">
                        Username should contain 4-10 alphanumeric characters.
                    </div>
                    <?php break;
                case 2: ?>
                    <!-- Error 2 -->
                    <div class="error">
                        Username already used, please use another username.
                    </div>
                    <?php break;
                case 3: ?>
                    <!-- Error 3 -->
                    <div class="error">
                        Password should be at least 8 characters, 1 upper case letter [A-Z], one special character
                        !,#,@.
                    </div>
                    <?php break;
                case 4: ?>
                    <!-- Error 4 -->
                    <div class="error">
                        Password and confirm password should match.
                    </div>
                    <?php break;
                case 5: ?>
                    <!-- Error 6 -->
                    <div class="error">
                        Please select a gender.
                    </div>
                    <?php break;
                case 6: ?>
                    <!-- Error 7 -->
                    <div class="error">
                        Please select a role.
                    </div>
                    <?php break;
                case 7: ?>
                    <!-- Error 8 -->
                    <div class="error">
                        Please enter the correct email format.
                    </div>
                    <?php break;
                case 8: ?>
                    <!-- Error 9 -->
                    <div class="error">
                        Please accept the terms.
                    </div>
                    <?php break;
                case 9: ?>
                    <!-- Error 10 -->
                    <div class="error">
                        Firstname and Lastname should only contain characters [A-Z] or [a-z]
                    </div>
                    <?php break; ?>
                <?php } endif; ?>

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
                        <input type="radio" name="gender" value="Male"> Male
                        <input type="radio" name="gender" value="Female"> Female
                        <input type="radio" name="gender" value="Other"> Other<br>
                    </p>
                    <p>
                        <label>Role</label><br>
                        <input type="radio" name="role" value="Student"> Student
                        <input type="radio" name="role" value="Manager"> Manager<br>
                    </p>
                    <p>
                        <label for="dept">Department</label><br>
                        <select id="dept" name="dept">
                            <?php foreach ($departments as $department) : ?>
                                <option value="<?= $department['departmentID'] ?>"><?= $department['departmentName'] ?></option>
                            <?php endforeach; ?>
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