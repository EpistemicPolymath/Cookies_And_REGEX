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
//session_destroy() ;
/*
Had to comment out session_destroy(); so when the user logs out it can
still save whether or not they
*/
header("Location:../login.php");