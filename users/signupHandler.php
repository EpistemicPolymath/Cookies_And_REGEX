<?php
include('../db_error/database.php');

#All elements from form brought over using POST
$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
$confirmPassword = filter_input(INPUT_POST, "confirmpassword");
$firstname = filter_input(INPUT_POST, "firstname");
$lastname = filter_input(INPUT_POST, "lastname");
$userEmail = filter_input(INPUT_POST, "email");
$userGender = filter_input(INPUT_POST, "gender");
$userRole = filter_input(INPUT_POST, "role");
$userDept = filter_input(INPUT_POST, "dept");
$userAgreement = filter_input(INPUT_POST, "accepted");

print_r($userDept);
print_r($userRole);
print_r($userGender);
print_r($firstname);
print_r($lastname);
print_r($userEmail);

# Get all usernames currently in the database
$queryUsersUsernames = $db->prepare("SELECT username
                                      FROM users");
$queryUsersUsernames->execute();
$allUsernames = $queryUsersUsernames->fetchAll();
$queryUsersUsernames->closecursor();

#Set error to 0 by default and through if statements change error, if an error occurs
$error = 0;

#First IF should if username contains 4-10 alphanumeric characters I copied this one from In Class 8
#I switched error=1 and error=2 because it makes more sense to check if username is correct before
#comparing it to the other usernames in the database
if(!(preg_match('/^[a-zA-Z0-9]{4,10}$/', $username)  === 1)) {

    $error = 1;
    header("Location:user_signup_form.php?error=" . $error);


} # This elseif should should use foreach to compare $allUsernames with the users $username elseif(){}

// Here goes the code to compare the database to see if the username matches an existing one.
//if(!(preg_match([], $username))) {
//
//    $error = 2;
//
//
//}

/*
 This elseif should if password matches the following:
(a) At least 8 characters. (?=.{8,})
(b) Should have one upper case letter [A-Z] (?=.*[A-Z])
(c) Should have one character from !,#,@. (?=.*?[#!@])
(d) All remaining characters can be [a-z] or [0-9]. [a-z][0-9]

(?=.*\d) - Checks for at least 1 digit

*/

elseif (!(preg_match('/(?=.{8,})(?=.*[A-Z])(?=.*[!#@])(?=.*\d)(.*[a-z0-9])/', $password) === 1)) {

    $error = 3;
    header("Location:user_signup_form.php?error=" . $error);
}
/*
 This elseif should if password matches the following:
(a) Matches ConfirmPassword
*/
elseif (!($password == $confirmPassword)) {

    $error = 4;
    header("Location:user_signup_form.php?error=" . $error);

}


/*
 This elseif should if Gender matches the following:
(a) Male || Female || Other
*/
elseif ((!isset($userGender)) && ($userGender != 'Male' || 'Female' || 'Other')) {

    $error = 5;
    header("Location:user_signup_form.php?error=" . $error);

}

/*
 This elseif should if Role matches the following:
(a) Student || Manager
*/
elseif ( (!isset($userRole)) && ($userRole != 'Student' || 'Manager')) {

    $error = 6;
    header("Location:user_signup_form.php?error=" . $error);

}

/*
(a) First part can contain alphanumeric characters [a-z], [A-Z],
[0-9], ‘.’, ‘-’, and ‘_’
(b) Should include ‘@’
(c) After the ‘@’ can contain alphanumeric characters [a-z], [A-Z],
[0-9], ‘.’
(d) The last part should contain domains from com or edu or net.
*/
//// Still have to work on email regex
elseif (!(preg_match('/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[com|edu|net]{3}$/', $userEmail) === 1)) {

    $error = 7;
    header("Location:user_signup_form.php?error=" . $error);

}

#This is error 9 you need to keep going in order from the errors
#in user_signup_form.php checking everything that is required in the PDF for HW6
elseif( (!isset($userAgreement)) && ($userAgreement != 'accepted'))
{

    $error = 8;
    header("Location:user_signup_form.php?error=" . $error);

}
/*
 This elseif should if firstname & lastname matches the following:
(a) Only composed of characters [a-z] or [A-Z].
*/
elseif (!(preg_match("/^[a-zA-Z]+$/", $firstname . $lastname) === 1)) {

    $error = 9;
    header("Location:user_signup_form.php?error=" . $error);

}

#This is where we can put the code to insert the user information into the database.
#Will confirm this later.


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Registration Handler</title>
    <!-- Framework CSS -->
    <link rel="stylesheet" href="../css/screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="../css/print.css" type="text/css" media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
</head>
<body>
<div class="container">
    <h1>Registration Complete</h1>
    <hr>
    <div class="span-3">
        <br/>
    </div>
    <div class="span-18">
        <div class="success">
            User successfully registered. <a href="../login.php">Login</a>.
        </div>
    </div>
    <div class="span-3 last">
        <br/>
    </div>
</div>
</body>
</html>
