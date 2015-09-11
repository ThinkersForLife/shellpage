<div id="demoGamesConfigurationMain">

	<form method="post" action="#">
	
	<?php
		include_once("../model/functions.php");
		$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");
		$activity_name=$xml->Configuration->Activity;
		require_once('../lib/smtemplate.php');	
		$tpl = new SMTemplate();
		$data = array(
			'demo_games_configuration' => $xml,
			'activity_name' => $activity_name,
		);
		$tpl->render('../view/demo_games_configuration',$data);
	?>
	    
	</form>
	
</div>
