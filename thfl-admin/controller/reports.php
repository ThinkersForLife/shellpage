<div id="reportsConfigurationMain">

	<form method="post" action="#">
	
	<?php	
		include_once("../model/functions.php");
		$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");				
		$activity_name=$xml->Configuration->Activity;
		$results=getResult(-1);
		//pr($results);exit();
		require_once('../lib/smtemplate.php');
		$tpl = new SMTemplate();
		$data = array(
			'results' => $results,
			'activity_name' => $activity_name,
		);
		$tpl->render('../view/reports',$data);
	?>
	    
	</form>
	
</div>
