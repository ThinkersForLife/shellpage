<?php
session_start();

$hashtag=$_SESSION["hashtag"];

$Score = $_REQUEST['score'];
$secs = time() - $_SESSION["time"];


$_SESSION["rawScr"] = $Score;
$_SESSION["time"] = $secs;

header("Location: ../../../model/log_result.php");
exit();
?>
