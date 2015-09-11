<?php 
//error_reporting(-1);
//ini_set('display_errors', 'On');

$xml=simplexml_load_file("../../../thfl-admin/config.xml") or die("Error: Cannot load configuration file");

//print_r($xml);
//echo "thfl-admin/assets/Games/".$xml->Configuration->Activity."/index.html";

//chdir("../../../thfl-admin/assets/Games/".$xml->Configuration->Activity."/");
//include("index.php");

if(file_exists("../../../thfl-admin/assets/Games/".$xml->Configuration->Activity."/index.php"))
	include("../../../thfl-admin/assets/Games/".$xml->Configuration->Activity."/index.php");
else{
?>
	<iframe src="thfl-admin/assets/Games/<?= $xml->Configuration->Activity ?>/index.html" frameborder="0" scrolling="no" id="iframe"  width="800" height="600"></iframe>

<?php } ?>	
