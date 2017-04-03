<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 3/29/2017
 * Time: 5:00 PM
 */


session_start();

#Check if the Session error response was set and display it on page.
if (isset($_SESSION['errorResponse'])) {
    $errorResponse = $_SESSION['errorResponse'];
}

#Check for set COOKIES
if(isset($_COOKIE["userName"]) && (isset($_COOKIE['passWord']))) {
    $userName = $_COOKIE['userName'];
    $passWord = $_COOKIE['passWord'];
} else {
    $userName = null;
    $passWord = null;
}

print_r($_COOKIE);
print_r($_COOKIE['userName']);
print_r($_COOKIE['passWord']);

?>
<!DOCTYPE html>
<html>
<head>
    <title>My University Schema-Login</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>

<body>

<h2>Login Form</h2>

<div class="errorMessageContainer container">

    <?php

    if (isset($errorResponse)) {

        echo "$errorResponse";
        unset($_SESSION['errorResponse']);
    }

    ?>
</div>

<form action="users/login_action.php" method="post">
    <div class="imgcontainer">
        <img src="img/unc-charlotte-logo.gif" alt="UNCC Logo">
    </div>

    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" value="<?=$userName?>" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" value="<?=$passWord ?>" required>

        <button type="submit">Login</button>
        <input type="checkbox" name="checkboxRemember" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
        <br/>
        <span class="register"><a href="users/user_signup_form.php">New User?</a></span>
    </div>
</form>

</body>
</html>

