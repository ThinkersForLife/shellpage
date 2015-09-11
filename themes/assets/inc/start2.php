<?php // Starting the session to track the latest word

//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();

include_once("../../../thfl-admin/model/functions.php");

$table = "4pics1";

//Getting the serial number of last inserted pic.
//				 NEW CODE by Jay: 2 May 2015, 10:01 AM
$mslno=getLastWordDetails($table);
//echo "<font color='white'>session serial before if:".$_SESSION['serial']."</font>";
//Mechanism to reset of increment the current word
if(!isset($_SESSION['serial'])){		
		$_SESSION['serial'] = 1 ;
		$_SESSION['score'] = 0 ;
}elseif($_SESSION['serial'] >= $mslno ){
		$_SESSION['hash']		=	time();
		$_SESSION['replay']	=	true;
		unset($_SESSION['serial']);
}
elseif(isset($_POST["submit"])) {
//		echo $_SESSION['serial'];exit(); 
}
else {
			$_SESSION['serial']  =	$_SESSION['serial']+1 ;
}

//echo "<font color='white'>session serial after if:".$_SESSION['serial']."</font>";

$serial = $_SESSION['serial'];

//echo "<font color='white'>serial before get:".$serial."</font>";

if($_GET['num']) {
		$serial = $_GET['num'];
}

//echo "<font color='white'>serial after get:".$serial."</font>";

//Get word details from serial no
// 									NEW CODE BY Jay: 2 May,2015 10:09 AM
$get_word_details=getWordDetails($serial,$table);
$word=$get_word_details[0]['word'];
$folder=$get_word_details[0]['slno']."/";

//echo "<font color='white'>word:".$word."</font>";

if($_POST["submit"] == "Send Answer") {
	if($_POST["Letters"] == $word && $_SESSION['word'] != $word){

				$_SESSION['time1'] = time() - $_SESSION['time1'];
				if($_SESSION['time1'] < 20){
				$_SESSION['score'] = $_SESSION['score'] + 10 ;	
					}
				elseif($_SESSION['time1'] > 20 && $_SESSION['time1'] < 40){
				$_SESSION['score'] = $_SESSION['score'] + 8	;
					}
				elseif($_SESSION['time1'] > 40 && $_SESSION['time1'] < 60){
				$_SESSION['score'] = $_SESSION['score'] + 6	;
					}
				elseif($_SESSION['time1'] > 60 && $_SESSION['time1'] < 90){
				$_SESSION['score'] = $_SESSION['score'] + 4	;
					}	
				elseif($_SESSION['time1'] > 90 && $_SESSION['time1'] < 120){
				$_SESSION['score'] = $_SESSION['score'] + 2	;
					}
				$_SESSION['word'] = $word ;
				$_SESSION['score'] = $_SESSION['score'] + 10 ;	
				
	}
	$_SESSION['time1'] = time() - $_SESSION['time1'];
}
else {
	


}


?>
