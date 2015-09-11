<?php
include_once("functions.php");
if(empty($_FILES)){
	echo true;exit();
}else{
//	print_r($_FILES);
//		echo hash("md5",time());exit();

	$xml=simplexml_load_file("../../thfl-admin/config.xml") or die("Error: Cannot load configuration file");

	//$demo_games_configuration['phone']=$xml->Configuration->ThemeName;
///	addWord();
//echo getcwd()."  ";
	$cwd=getcwd();

	//Old code
	//chdir("../../themes/".$demo_games_configuration["theme_name"]."/assets/uploads/");
	//New Code

	chdir("../../themes/assets/pics/");
//	echo getcwd()."  ";

	$val=hash("md5",time());

	if(!file_exists($val))
		mkdir($val);

	$upload_dir="$val";


//	pr($_FILES);
	$client_upload_dir=$upload_dir."/";
	$cnt=0;
//	foreach($_FILES['tmp_name'] as $file){
		for($i=0;$i<4;$i++){			
			if(move_uploaded_file($_FILES['photos']['tmp_name'][$cnt], $client_upload_dir.$_FILES['photos']['name'][$cnt]))
			{
				$files[] = $_FILES['photos']['tmp_name'][$cnt];
			}
			$cnt++;
		}

	chdir("../../../thfl-admin/model");
//	echo "dest: "."../../themes/assets/pics/".$client_upload_dir;
//	echo "source:".getcwd();
//	copy("../../../../thfl-admin/model/reformat.xx","../../themes/assets/pics/".$client_upload_dir);
	echo $val;exit();
	//echo $site_configuration['site_id']."/".$file['name'][0];
}
