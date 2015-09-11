<?php
// i will keep yelling this
// DON'T FORGET TO START THE SESSION !!!
session_start();

// if the user is logged in, unset the session
if (isset($_SESSION['logged_in'])) {
	unset($_SESSION['logged_in']);
	unset($_SESSION["gname"]);
	unset($_SESSION["gemail"]);
}

// now that the user is logged out,
// go to login page
header('Location: ../index.php');
?>