<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();
include_once("functions.php");
include_once("db_config.php");

$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");

$sql_query="INSERT INTO ".RESULT_TABLE." SET name='".$_SESSION['visitor_name']."', email='".$_SESSION['visitor_email']."', location='".$_SESSION['visitor_location']."',quizName='".$xml->Configuration->Activity."',rawScr='".$_SESSION['rawScr']."',gameTime='".$_SESSION['time']."'";

runQuery($sql_query);

$_SESSION['isLoggedIn']=true;
header("Location: ../../index.php#result");
exit();
?>
