<?php
include_once("functions.php");
if(empty($_FILES)){
	echo true;exit();
}else{
//	print_r($_FILES);

	$xml=simplexml_load_file("../../thfl-admin/config.xml") or die("Error: Cannot load configuration file");

	//$demo_games_configuration['phone']=$xml->Configuration->ThemeName;

	$cwd=getcwd();

	//Old code
	//chdir("../../themes/".$demo_games_configuration["theme_name"]."/assets/uploads/");
	//New Code
	chdir("../../themes");
	
	$upload_dir="assets/uploads";

	$client_upload_dir=$upload_dir."/";
	

	foreach($_FILES as $file){
		if(move_uploaded_file($file['tmp_name'][0], $client_upload_dir.$file['name'][0]))
		{
			$files[] = $file['name'][0];
		}
	}
	chdir("../../../../thfl-admin/model");
	echo true;exit();
	//echo $site_configuration['site_id']."/".$file['name'][0];
}
