<?php 
$path_info=pathinfo(basename($_SERVER['HTTP_REFERER']));
if(strcmp($path_info['extension'],'swf')==0){
	header("Location: ../flash_index.php#result");
	exit();
}

header("Location: ../flash_index.php");
exit();
?>
