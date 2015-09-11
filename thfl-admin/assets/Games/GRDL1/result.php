<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();

include_once("../../../model/functions.php");
include_once("../../../model/db_config.php");
include_once("config.php");

$_SESSION['shell_result_fields']['name']				=		$_SESSION['visitor_name'];
$_SESSION['shell_result_fields']['email']				=		$_SESSION['visitor_email'];
$_SESSION['shell_result_fields']['companyName']	=		$_SESSION['company_name'];
$_SESSION['shell_result_fields']['location']		=		$_SESSION['visitor_location'];
$_SESSION['shell_result_fields']['quizName']		=		"Adventure Sports";
$_SESSION['shell_result_fields']['rawScr']			=		$_POST['score'];
$_SESSION['shell_result_fields']['gameTime']		=		$_POST['SECOND'];
$_SESSION['shell_result_fields']['field4']			=		"played on: ".date("d M Y H:i:s");

//Creating dynamic INSERT query with the fields in config.php which has TRUE as their value
$shell_result_fields=array_keys($shell_result_fields,true);
$sql_query="INSERT INTO ".RESULT_TABLE." SET ";
for($i=0;$i<count($shell_result_fields);$i++){
	$sql_query.=''.$shell_result_fields[$i].'="'.$_SESSION['shell_result_fields'][$shell_result_fields[$i]].'",';
}
$sql_query=rtrim($sql_query,",");

runQuery($sql_query);

$_SESSION['isLoggedIn']=true;

header("Location: ../../../../index.php#result");
exit();
?>
