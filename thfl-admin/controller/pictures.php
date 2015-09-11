<div id="picturesConfigurationMain">

	<form method="post" action="#">
	
	<?php
		include_once("../model/functions.php");
		$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");				
		$pictures=getWordDetails();
		$count=0;
		foreach($pictures as $item){ 			
			$files=scandir("../../themes/assets/pics/".$item['slno']."/",1); 
			$pictures[$count]['picture_list']=$files;
			$count++;
		}
		$activity_name=$xml->Configuration->Activity;
		require_once('../lib/smtemplate.php');	
		$tpl = new SMTemplate();
		$data = array(
			'pictures' => $pictures,
			'activity_name' => $activity_name,
		);
		$tpl->render('../view/pictures',$data);
	?>
	    
	</form>
	
</div>
