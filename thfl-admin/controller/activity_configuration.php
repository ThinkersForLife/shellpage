<div id="activityConfigurationMain">

	<form method="post" action="#">

	<?php	
		include_once("../model/functions.php");
		$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");				
		$activity_name=$xml->Configuration->Activity;
		$activities=scandir("../assets/Games/",1);
		require_once('../lib/smtemplate.php');
		$tpl = new SMTemplate();
		$data = array(
			'activities' => $activities,
			'activity_name' => $activity_name
		);
		$tpl->render('../view/activity_configuration',$data);
	?>
	    
	</form>
	
</div>
