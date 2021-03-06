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

#This is the code to get it working w/ cookies but it would not work
#Check for set COOKIES
if(isset($_COOKIE["userName"]) && (isset($_COOKIE['passWord']))) {
    $userName = $_COOKIE['userName'];
    $passWord = $_COOKIE['passWord'];
} else {
    $userName = null;
    $passWord = null;
}

#Cookie that determines if in the last POST if Remember Me was checked or not
if(isset($_COOKIE['checked'])){
    #IF checked value set = 1
    $checked = 1;


}else {
    #If not checked value set to null
    $checked = null;

}

//#Check for set SESSION COOKIES
//if (isset($_SESSION["cookieUname"]) && (isset($_SESSION['cookiePass']))) {
//    $userName = $_SESSION['cookieUname'];
//    $passWord = $_SESSION['cookiePass'];
//} else {
//    $userName = null;
//    $passWord = null;
//}
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
        <input type="text" placeholder="Enter Username" name="username" value="<?= $userName ?>" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pass" value="<?= $passWord ?>" required>

        <button type="submit">Login</button>
        <!-- This uses one line if statement to check if checkbox is checked and if it is keep it checked and if not keep it unchecked -->
        <!-- By default it will Remember me will be checked, but if user unchecks / checks upon submitting it will remember the users choice. -->
        <input type="checkbox" name="checkboxRemember" <?=(array_key_exists('checkboxRemember',$_POST) || $checked == 1) ? "checked='checked'" : " "; ?> > Remember me
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

