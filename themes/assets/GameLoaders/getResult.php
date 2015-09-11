<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();
if(isset($_POST['getuserscores'])){
	echo $_SESSION['maxScr']==0?"0":$_SESSION['maxScr'];exit();
}

if(isset($_POST['getuserserial'])){
	echo $_SESSION['serial']==0?"0":$_SESSION['serial'];exit();
}

if(isset($_POST['getusername'])){
	echo $_SESSION['visitor_name'];exit();
}
if(isset($_POST['ngr'])){
	include_once("../../../thfl-admin/model/functions.php");
	$arr=getResult();
	print_r(json_encode($arr));exit();
}
if(isset($_POST['logRatings'])){
	include_once("../../../thfl-admin/model/functions.php");
	$ratings=$_POST['logRatings'];
	$arr=logRatings($_SESSION['visitor_name'],$_SESSION['visitor_email'],$ratings);
	$_SESSION['ratings']=1;
	echo $arr;
	exit();
}
//chdir("../../../");
//echo getcwd();
include_once("../../../thfl-admin/model/functions.php");
$arr=getResult("getResult");
print_r(json_encode($arr));exit();

