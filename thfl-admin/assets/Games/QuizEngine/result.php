<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();


$_SESSION['shell_result_fields']['name']				=		$_SESSION['visitor_name'];
$_SESSION['shell_result_fields']['email']				=		$_SESSION['visitor_email'];
$_SESSION['shell_result_fields']['companyName']	=		$_SESSION['company_name'];
$_SESSION['shell_result_fields']['location']		=		$_SESSION['visitor_location'];
$_SESSION['shell_result_fields']['quizName']		=		"Quiz Engine";
$_SESSION['shell_result_fields']['rawScr']			=		filter_input(INPUT_POST,'score',FILTER_SANITIZE_NUMBER_INT);
$_SESSION['shell_result_fields']['totalScr']		=		filter_input(INPUT_POST,'score',FILTER_SANITIZE_NUMBER_INT);
$_SESSION['shell_result_fields']['field4']			=		"played on: ".date("d M Y H:i:s");

include_once("../../../model/functions.php");
include_once("../../../model/db_config.php");
include_once("config.php");

//Creating dynamic INSERT query with the fields in config.php which has TRUE as their value
$shell_result_fields=array_keys($shell_result_fields,true);
$sql_query="INSERT INTO ".RESULT_TABLE." SET ";
for($i=0;$i<count($shell_result_fields);$i++){
	$sql_query.=''.$shell_result_fields[$i].'="'.$_SESSION['shell_result_fields'][$shell_result_fields[$i]].'",';
}
$sql_query.='session_id="'.session_id().'",';
$sql_query.='ip_address="'.get_client_ip().'",';
$sql_query.='user_agent="'.$_SERVER['HTTP_USER_AGENT'].'",';
$sql_query=rtrim($sql_query,",");
/*
echo "<br />sql query: ".$sql_query;
echo "<br /><br />";
echo "<pre> SESSION ARRAY: <br /><br />";
print_r($_SESSION);
echo "</pre><pre> POST ARRAY: <br /><br />";
print_r($_POST);
exit();*/
runQuery($sql_query);

$_SESSION['isLoggedIn']=true;

header("Location: ../../../../index.php#result");
exit();
?>
