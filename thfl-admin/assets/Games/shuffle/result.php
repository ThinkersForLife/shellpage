<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();

include_once("../../../model/functions.php");
include_once("../../../model/db_config.php");
include_once("config.php");

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
