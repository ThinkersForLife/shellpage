<?php
session_start();
$_SESSION['shell_result_fields']['name']				=		$_SESSION['visitor_name'];
$_SESSION['shell_result_fields']['email']				=		$_SESSION['visitor_email'];
$_SESSION['shell_result_fields']['companyName']	=		$_SESSION['company_name'];
$_SESSION['shell_result_fields']['location']		=		$_SESSION['visitor_location'];
$_SESSION['shell_result_fields']['quizName']		=		"Shuffle";
$_SESSION['shell_result_fields']['rawScr']			=		filter_input(INPUT_POST,'score',FILTER_SANITIZE_NUMBER_INT);
$_SESSION['shell_result_fields']['totalScr']		=		filter_input(INPUT_POST,'score',FILTER_SANITIZE_NUMBER_INT);
$_SESSION['shell_result_fields']['gameTime']		=		$_POST['time'];
$_SESSION['shell_result_fields']['field1']			=		'clicks: ' .filter_input(INPUT_POST,'clicks',FILTER_SANITIZE_NUMBER_INT);;
$_SESSION['shell_result_fields']['field4']			=		"played on: ".date("d M Y H:i:s");

header("Location: result.php");
exit();
