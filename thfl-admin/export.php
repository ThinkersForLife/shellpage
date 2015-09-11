<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
ob_start();
session_start();
//print_r($_SESSION);exit();
//echo getcwd();
$xml=simplexml_load_file("config.xml") or die("Error: Cannot load configuration file");
if( ! isset($_SESSION['isAdminLoggedIn']) || (strcmp($_SESSION['isAdminLoggedIn'],"")==0) ) { 
	
	header("Location: dashboard.php");
	exit(0);
	
}
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include_once("lib/PHPExcel/Classes/PHPExcel.php");
include_once("model/functions.php");

if(isset($_GET['only'])){

	$report=getResultforExport(-1,-1);
}else if(isset($_GET['total'])){
	$report=getResultforExport(-1);

}
//echo $xml->Configuration->Activity;
//pr($report);
$objPHPExcel = new PHPExcel();
$objPHPExcel->getActiveSheet()->setTitle($xml->Configuration->NameofActivity." Report");	
$objPHPExcel->getActiveSheet()->fromArray($report, null, 'A1');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_GET['only'])){
	header('Content-Disposition: attachment;filename="'.$xml->Configuration->NameofActivity." ".date("c").'" Unique Users Report.xlsx');	
}else{
	header('Content-Disposition: attachment;filename="'.$xml->Configuration->NameofActivity." ".date("c").'" Total Game Report.xlsx');	
}
header('Cache-Control: max-age=0');
$outputFileType = 'Excel2007';
$objPHPExcelWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,$outputFileType);
$objPHPExcelWriter->save('php://output');
