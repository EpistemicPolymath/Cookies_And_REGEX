<?php
/**
 * Created by PhpStorm.
 * User: EpistemicPolymath
 * Date: 3/31/2017
 * Time: 3:30 PM
 */

session_start();
unset($_SESSION['userName']);
unset($_SESSION['firstName']);
unset($_SESSION['userRole']);
unset($_SESSION['userID']);
unset($_SESSION['deptID']);

If (isset($_SESSION['cookieUname']) && isset($_SESSION['cookiePass'])) {

    $cookieUname = $_SESSION['cookieUname'];
    $cookiePass = $_SESSION['cookiePass'];
}
session_destroy();
session_start();

if (isset($cookieUname) && isset($cookiePass)) {
    $_SESSION['cookieUname'] = $cookieUname;
    $_SESSION['cookiePass'] = $cookiePass;
}
/*
Had to comment out session_destroy(); so when the user logs out it can
still save whether or not they
*/
header("Location:../login.php");