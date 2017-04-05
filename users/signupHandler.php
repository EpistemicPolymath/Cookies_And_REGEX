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



# Compare user's new username to usernames currently in the database
#Gets a count of all rows that match the userName, should only be 1 row since userName is unique
$queryUsersUsernames = $db->prepare("SELECT Count(*)
                                      FROM users
                                      WHERE userName = :userName");
$queryUsersUsernames->execute(array(
    ":userName" => $username
));
$checkUsername = $queryUsersUsernames->fetchColumn();
$queryUsersUsernames->closecursor();


# Compare user's inputted email to emails currently in the database
#Gets a count of all rows that match the email, should only be 1 row since email is unique
$queryUsersEmails = $db->prepare("SELECT Count(*)
                                      FROM users
                                      WHERE email = :email");
$queryUsersEmails->execute(array(
    ":email" => $userEmail
));
$checkEmail = $queryUsersEmails->fetchColumn();
$queryUsersEmails->closecursor();


#Set error to 0 by default and through if statements change error, if an error occurs
$error = 0;

#First IF should if username contains 4-10 alphanumeric characters I copied this one from In Class 8
#I switched error=1 and error=2 because it makes more sense to check if username is correct before
#comparing it to the other usernames in the database
if(!(preg_match('/^[a-zA-Z0-9]{4,10}$/', $username)  === 1)) {

    $error = 1;
    header("Location:user_signup_form.php?error=" . $error);


}
// Here goes the code to compare the database to see if the username matches an existing one.

elseif($checkUsername == 1) {

    $error = 2;
    header("Location:user_signup_form.php?error=" . $error);

}
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

} #Checks if email is in use
 elseif($checkEmail == 1){

    $error = 10;
     header("Location:user_signup_form.php?error=" . $error);
 }

#This is where we can put the code to insert the user information into the database.

$queryInsertIntoUsers = $db->prepare("INSERT INTO users (userName, email, password, firstName, lastName, role, deptID, gender)
                                     VALUES (:userName, :email, :password, :firstname, :lastname, :role, :deptID, :gender)");
$queryInsertIntoUsers->execute(array(
        ":userName" => $username,
        ":email" => $userEmail,
        ":password" => $password,
        ":firstname" => $firstname,
        ":lastname" => $lastname,
        ":role" => $userRole,
        ":deptID" => $userDept,
        ":gender" => $userGender
));

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
