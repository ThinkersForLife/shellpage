<div id="databaseConfigurationMain">

	<form method="post" action="#">
	
	<?php
		include_once("../model/functions.php");
		include_once("../model/db_info.php");
		$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");
		$activity_name=$xml->Configuration->Activity;
		require_once('../lib/smtemplate.php');	
		$tpl = new SMTemplate();
		$data = array(
			'activity_details' => $xml,
			'dbname' => $dbname,
			'dbuser' => $dbuser,
			'dbpass' => $dbpass,
			'dbtable' => $dbtable,
			'activity_name' => $activity_name,
		);
		$tpl->render('../view/database_configuration',$data);
	?>
	    
	</form>
	
</div>
