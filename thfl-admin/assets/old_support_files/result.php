<?php
session_start();

$hashtag=$_SESSION["hashtag"];

$Score = $_REQUEST['score'];
$secs = time() - $_SESSION["time"];


$_SESSION["rawScr"] = $Score;
$_SESSION["time"] = $secs;

include_once("../../../model/functions.php");
include_once("../../../model/db_config.php");

$xml=simplexml_load_file("../../../config.xml") or die("Error: Cannot load configuration file");

$sql_query="INSERT INTO ".RESULT_TABLE." SET name='".$_SESSION['visitor_name']."', email='".$_SESSION['visitor_email']."', location='".$_SESSION['visitor_location']."',quizName='".$xml->Configuration->Activity."',rawScr='".$_SESSION['rawScr']."',gameTime='".$_SESSION['time']."'";

runQuery($sql_query);

$_SESSION['isLoggedIn']=true;
header("Location: ../../../../index.php#result");
exit();


//header("Location: ../../../model/log_result.php");
//exit();
?>
