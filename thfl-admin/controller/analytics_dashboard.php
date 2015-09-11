<?php	
	include_once("../model/functions.php");
	$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");				
	$activity_name=$xml->Configuration->Activity;
	require_once('../lib/smtemplate.php');
	$tpl = new SMTemplate();
	$data = array(
		'site_id' => $xml->Configuration->PiwikSiteId,
		'activity_name' => $activity_name,
	);
	$tpl->render('../view/analytics_dashboard',$data);
?>
