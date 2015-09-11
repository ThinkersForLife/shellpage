<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');

define("ENCRYPTION_KEY", "!@#$%^&*");

function pr($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
function edit_db_info_file ($variable_name,$line,$variable_value) {
	
	$filename = "db_info.php";
	$line_i_am_looking_for = $line;
	$lines = file( $filename , FILE_IGNORE_NEW_LINES );
	$lines[$line_i_am_looking_for] = "\$$variable_name = \"" . $variable_value ."\";";
	file_put_contents( $filename , implode( "\n", $lines ) );
	
}

function edit_theme_configuration_file ($variable_name,$line,$variable_value) {
	
	$filename = "../../themes/assets/css/less_files/variables.less";
	$line_i_am_looking_for = $line;
	$lines = file( $filename , FILE_IGNORE_NEW_LINES );
	//echo "old_variable : ".$lines[$line_i_am_looking_for];
	$lines[$line_i_am_looking_for] = "@$variable_name: " . $variable_value .";";	
	//echo "new_variable: ".$lines[$line_i_am_looking_for];
	file_put_contents( $filename , implode( "\n", $lines ) );
	return "Theme configuration has been changed successfully!";
}


function get_theme_configuration_file ($file_name='variables.less') {
	//echo getcwd();
	$filename = $file_name;
	$line_i_am_looking_for = $line;
	$lines = file( $filename , FILE_IGNORE_NEW_LINES );
	return $lines;
	/*$lines[$line_i_am_looking_for] = "\$$variable_name = \"" . $variable_value ."\";";
	file_put_contents( $filename , implode( "\n", $lines ) );*/
	
}

function strtohex($x) 
{
    $s='';
    foreach (str_split($x) as $c) $s.=sprintf("%02X",ord($c));
    return($s);
} 
/*
function encrypt($data, $key){
    return base64_encode(
    mcrypt_encrypt(
        MCRYPT_RIJNDAEL_128,
        $key,
        $data,
        MCRYPT_MODE_CBC,
        '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0'
    )
);
}
function decrypt($data, $key){
    $decode = base64_decode($data);
    return mcrypt_decrypt(
                    MCRYPT_RIJNDAEL_128,
                    $key,
                    $decode,
                    MCRYPT_MODE_CBC,
                    '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0'
            );
    
    
}*/
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
/**
*		As in_array does not work with multidimensional array.
*		We've to manually create a function which recursively check if an element or a value exists in a multidimensional array.
*/
function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}

/*
		Removes the directory with all the files in it.
*/
function rrmdir($dir) { 
 if (is_dir($dir)) { 
   $objects = scandir($dir); 
   foreach ($objects as $object) { 
     if ($object != "." && $object != "..") { 
       if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object); 
     } 
   } 
   reset($objects); 
   rmdir($dir); 
 } 
}

/**
*
*	Returns the mime-type of uploaded file
*
**/
function check_mime_content_type($filename) {

	$mime_types = array(

	    'txt' => 'text/plain',
	    'htm' => 'text/html',
	    'html' => 'text/html',
	    'php' => 'text/html',
	    'css' => 'text/css',
	    'js' => 'application/javascript',
	    'json' => 'application/json',
	    'xml' => 'application/xml',
	    'swf' => 'application/x-shockwave-flash',
	    'flv' => 'video/x-flv',

	    // images
	    'png' => 'image/png',
	    'jpe' => 'image/jpeg',
	    'jpeg' => 'image/jpeg',
	    'jpg' => 'image/jpeg',
	    'gif' => 'image/gif',
	    'bmp' => 'image/bmp',
	    'ico' => 'image/vnd.microsoft.icon',
	    'tiff' => 'image/tiff',
	    'tif' => 'image/tiff',
	    'svg' => 'image/svg+xml',
	    'svgz' => 'image/svg+xml',

	    // archives
	    'zip' => 'application/zip',
	    '7z' => 'application/x-7z-compressed',
	    'rar' => 'application/x-rar-compressed',
	    'exe' => 'application/x-msdownload',
	    'msi' => 'application/x-msdownload',
	    'cab' => 'application/vnd.ms-cab-compressed',

	    // audio/video
	    'mp3' => 'audio/mpeg',
	    'qt' => 'video/quicktime',
	    'mov' => 'video/quicktime',

	    // adobe
	    'pdf' => 'application/pdf',
	    'psd' => 'image/vnd.adobe.photoshop',
	    'ai' => 'application/postscript',
	    'eps' => 'application/postscript',
	    'ps' => 'application/postscript',

	    // ms office
	    'doc' => 'application/msword',
	    'rtf' => 'application/rtf',
	    'xls' => 'application/vnd.ms-excel',
	    'ppt' => 'application/vnd.ms-powerpoint',

	    // open office
	    'odt' => 'application/vnd.oasis.opendocument.text',
	    'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
	);

	$ext = strtolower(array_pop(explode('.',$filename)));
	if (array_key_exists($ext, $mime_types)) {
	    return $mime_types[$ext];
	}
	elseif (function_exists('finfo_open')) {
	    $finfo = finfo_open(FILEINFO_MIME);
	    $mimetype = finfo_file($finfo, $filename);
	    finfo_close($finfo);
	    return $mimetype;
	}
	else {
	    return 'application/octet-stream';
	}
}

/**
*	Check if Uploaded file is a zip file or not.
**/

function is_zip_file($filename) {

	$mime_types = array(

	    // archives
	    'zip' => 'application/zip',
	    'rar' => 'application/x-rar-compressed',
	    '7z' => 'application/x-7z-compressed',
	    'exe' => 'application/x-msdownload',
	    'msi' => 'application/x-msdownload',
	    'cab' => 'application/vnd.ms-cab-compressed',

	);

	$ext = strtolower(array_pop(explode('.',$filename)));
	if (array_key_exists($ext, $mime_types)) {
	    return true;
	}
	else {
	    return false;
	}
}

/**
*	Check if Uploaded zip is valid file or not.
**/
function zipIsValid($path) {
  $zip = zip_open($path);
  if (is_resource($zip)) {
    // it's ok
    zip_close($zip); // always close handle if you were just checking
    return true;
  } else {
    return false;
  }
}

/**
 * Returns an encrypted & utf8-encoded
 */
function encrypt($pure_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
    return $encrypted_string;
}

/**
 * Returns decrypted original string
 */
function decrypt($encrypted_string, $encryption_key) {
    $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
    return $decrypted_string;
}

/**
*		Updates the folder name to new given name and also renames all the files to 1,2,3,4 - .ext files
*/
function updateWordFolder($old_folder_name,$new_folder_name){

	chdir("../../themes/assets/pics/");

	rename($old_folder_name,$new_folder_name);

	$files2=scandir($new_folder_name,1);

	chdir($new_folder_name);
	$all_pics="";
	for($i=0;$i<count($files2)-2;$i++){

				$path_info=pathinfo($files2[$i]);
//				rename($files2[$i],($i+1).".".$path_info['extension']);
				$all_pics.=($i+1).".".$path_info['extension']." ";

	}

//  $output = shell_exec("$cwd/reformat.xx  " . $all_pics);
	//Next step: DELETE reformat.xx

}

if(isset($_POST['change_theme_configuration'])){
	$body_color=$_POST['body_color'];
	$header_h1_color=$_POST['header_h1_color'];
	$header_tagline_color=$_POST['header_tagline_color'];
	$games_background_color=$_POST['games_background_color'];
	$login_div_text_color=$_POST['login_div_text_color'];
	$input_border_color=$_POST['input_border_color'];
	$input_background_color=$_POST['input_background_color'];
	$input_text_color=$_POST['input_text_color'];
	$result_background_color=$_POST['result_background_color'];
	$result_title_color=$_POST['result_title_color'];
	$user_result_color=$_POST['user_result_color'];
	$scores_div_text_color=$_POST['scores_div_text_color'];
	$footer_text_color=$_POST['footer_text_color'];
	$footer_background_color=$_POST['footer_background_color'];
	$user_score_div_text_color=$_POST['user_score_div_text_color'];
	$user_welcome_text_color=$_POST['user_welcome_text_color'];
	$user_rank_text_color=$_POST['user_rank_text_color'];

	$result=edit_theme_configuration_file("body-color",0,$body_color);
	$result=edit_theme_configuration_file("header-h1-color",1,$header_h1_color);
	$result=edit_theme_configuration_file("header-tagline-color",2,$header_tagline_color);
	$result=edit_theme_configuration_file("games-background-color",4,$games_background_color);
	$result=edit_theme_configuration_file("login-div-text-color",5,$login_div_text_color);
	$result=edit_theme_configuration_file("input-border-color",6,$input_border_color);
	$result=edit_theme_configuration_file("input-background-color",7,$input_background_color);
	$result=edit_theme_configuration_file("input-text-color",8,$input_text_color);
	$result=edit_theme_configuration_file("result-background-color",9,$result_background_color);
	$result=edit_theme_configuration_file("result-title-color",10,$result_title_color);
	$result=edit_theme_configuration_file("user-result-color",11,$user_result_color);
	$result=edit_theme_configuration_file("scores-div-text-color",12,$scores_div_text_color);
	$result=edit_theme_configuration_file("footer-text-color",13,$footer_text_color);
	$result=edit_theme_configuration_file("footer-background-color",14,$footer_background_color);
	$result=edit_theme_configuration_file("user-score-div-text-color",15,$user_score_div_text_color);
	$result=edit_theme_configuration_file("user-welcome-text-color",16,$user_welcome_text_color);
	$result=edit_theme_configuration_file("user-rank-text-color",17,$user_rank_text_color);
	echo $result;exit();
	//pr($_POST);exit();
}else if(isset($_POST['updateDemoGames'])){

					$xml = new DOMDocument('1.0', 'utf-8');
					$xml->formatOutput = true;
					$xml->preserveWhiteSpace = false;
					$xml->load('../config.xml') or die("Couldn't load config.xml post->updateDemoGames");

					//Get item Element
					$element = $xml->getElementsByTagName('Configuration')->item(0) or die("Couldn't find Configuration node");

					//Load child elements
					$HomePageTitle = $element->getElementsByTagName('HomePageTitle')->item(0) or die("Couldn't load HomePageTitle");
					$HomeBackgroundImage = $element->getElementsByTagName('HomeBackgroundImage')->item(0) or die("Couldn't load HomeBackgroundImage");
					$HomePageDescription = $element->getElementsByTagName('HomePageDescription')->item(0) or die("Couldn't load HomePageDescription");
					$GamesPageTitle = $element->getElementsByTagName('GamesPageTitle')->item(0) or die("Couldn't load GamesPageTitle");
					$GamesPageDescription = $element->getElementsByTagName('GamesPageDescription')->item(0) or die("Couldn't load GamesPageDescription");
					$GamesPageButtonText = $element->getElementsByTagName('GamesPageButtonText')->item(0) or die("Couldn't load GamesPageButtonText");
					$GamesPageButtonLink = $element->getElementsByTagName('GamesPageButtonLink')->item(0) or die("Couldn't load GamesPageButtonLink");
					$ResultPageVisible = $element->getElementsByTagName('ResultPageVisible')->item(0) or die("Couldn't load ResultPageVisible");
					$ResultPageTitle = $element->getElementsByTagName('ResultPageTitle')->item(0) or die("Couldn't load ResultPageTitle");
					$ResultPageDescription = $element->getElementsByTagName('ResultPageDescription')->item(0) or die("Couldn't load ResultPageDescription");
					$ResultPageButtonText = $element->getElementsByTagName('ResultPageButtonText')->item(0) or die("Couldn't load ResultPageButtonText");
					$ResultPageButtonLink = $element->getElementsByTagName('ResultPageButtonLink')->item(0) or die("Couldn't load ResultPageButtonLink");
					$ContactPageTitle = $element->getElementsByTagName('ContactPageTitle')->item(0) or die("Couldn't load ContactPageTitle");
					$AddressLine1 = $element->getElementsByTagName('AddressLine1')->item(0) or die("Couldn't load AddressLine1");
					$AddressLine2 = $element->getElementsByTagName('AddressLine2')->item(0) or die("Couldn't load AddressLine2");
					$CityState = $element->getElementsByTagName('CityState')->item(0) or die("Couldn't load CityState");
					$Phone = $element->getElementsByTagName('Phone')->item(0) or die("Couldn't load Phone");
					$Email = $element->getElementsByTagName('Email')->item(0) or die("Couldn't load Email");
					$HeaderLogo = $element->getElementsByTagName('HeaderLogo')->item(0) or die("Couldn't load HeaderLogo");
					$FooterDescription = $element->getElementsByTagName('FooterDescription')->item(0) or die("Couldn't load FooterDescription");
					$FooterTitle = $element->getElementsByTagName('FooterTitle')->item(0) or die("Couldn't load FooterTitle");

					//Replacing the value 
					$HomePageTitle->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['home_title']);

					if(!empty($_POST['home_page_image']) && strcmp($_POST['home_page_image'],"")!=0)
						$HomeBackgroundImage->nodeValue=$_POST['home_page_image'];
					if(!empty($_POST['header_logo']) && strcmp($_POST['header_logo'],"")!=0 && $_POST['header_logo']!="null")
						$HeaderLogo->nodeValue=$_POST['header_logo'];
					
					$HomePageDescription->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['home_tagline']);
					$GamesPageTitle->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['games_title']);
					$GamesPageDescription->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['games_description']);
					$GamesPageButtonText->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['game_page_button_text']);
					$GamesPageButtonLink->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['game_page_button_link']);
					$ResultPageVisible->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['result_page_visible']);
					$ResultPageTitle->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['result_title']);
					$ResultPageDescription->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['games_title']);
					$ResultPageButtonText->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['result_page_button_text']);
					$ResultPageButtonLink->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['result_page_button_link']);
					$ContactPageTitle->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['contact_title']);
					$AddressLine1->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['address_line_1']);
					$AddressLine2->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['address_line_2']);
					$CityState->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['city_state']);
					$Phone->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['phone']);
					$Email->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['email']);
					$FooterDescription->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['footer_description']);
					$FooterTitle->nodeValue=str_replace("&nbsp;","&#xA0;",$_POST['footer_title']);

					$xml->save("../config.xml") or die("Couldn't save");

					echo "Shell Activity Configuration Updated";

	
}elseif(isset($_POST['updateXML'])){

					$xml = new DOMDocument('1.0', 'utf-8');
					$xml->formatOutput = true;
					$xml->preserveWhiteSpace = false;
					$xml->load('../config.xml');

					$cwd=getcwd();

					if($xml===FALSE)
						$xml->load('../../config.xml');	
	
					//Get item Element
					$element = $xml->getElementsByTagName('Configuration')->item(0) or die("Couldn't find Configuration node");

					//Load child elements
					$NameofActivity = $element->getElementsByTagName('NameofActivity')->item(0) or die("Couldn't load NameofActivity");
					/*$DatabaseName = $element->getElementsByTagName('DatabaseName')->item(0) or die("Couldn't load DatabaseName");
					$DatabaseUser = $element->getElementsByTagName('DatabaseUser')->item(0) or die("Couldn't load DatabaseUser");
					$DatabasePassword = $element->getElementsByTagName('DatabasePassword')->item(0) or die("Couldn't load DatabaseUser");
					$DatabaseTable = $element->getElementsByTagName('DatabaseTable')->item(0) or die("Couldn't load DatabaseTable");*/
					$EmailDomain = $element->getElementsByTagName('EmailDomain')->item(0) or die("Couldn't load EmailDomain");
					$Domain = $element->getElementsByTagName('Domain')->item(0) or die("Couldn't load Domain");
					$domain_name=(string)$Domain->nodeValue;
					$Location = $element->getElementsByTagName('Location')->item(0) or die("Couldn't load Location");
					$TrackingCode = $element->getElementsByTagName('TrackingCode')->item(0) or die("Couldn't load TrackingCode");
					$PiwikSiteId = $element->getElementsByTagName('PiwikSiteId')->item(0) or die("Couldn't load PiwikSiteId");

					/**		Piwik API Implementation	 	**/

					$check_if_site_exist_method="SitesManager.getSitesIdFromSiteUrl";
					$add_site_method="SitesManager.addSite";
					$get_tracking_code_method="SitesManager.getJavascriptTag";

					$p = array();
					$p['module'] = "API";
					$p['method'] = $check_if_site_exist_method;
					$p['format'] = "xml";
					$p['url'] = "http://".$domain_name;
					$token_auth="62e34495aefcea704aef864fe983bcb7";

					$url = "http://analytics.connectedforlife.in/index.php?"  . http_build_query($p);
					$url .= "&token_auth=$token_auth";
	
					//Check if site already exists
					$fetched = file_get_contents($url) or die("Problem in Validating the site");

					$fetch_xml=simplexml_load_string($fetched);

					if(isset($fetch_xml->row->idsite)){	

					}else{


						$p['siteName'] 	= 	$domain_name;	
						$p['urls'] 			= 	"http://".$domain_name;
						$p['method'] 		=	 	$add_site_method;
						$url 						= 	"http://analytics.connectedforlife.in/index.php?"  . http_build_query($p);
						$url 						.= 	"&token_auth=$token_auth";

						//Adding a new site
						$fetched = file_get_contents($url) or die("Problem in adding the site");
		
					}
					$PiwikSiteId->nodeValue=$fetch_xml->row->idsite;
					$TrackingCode->nodeValue='<!-- Piwik --> <script type="text/javascript"> var _paq = _paq || []; _paq.push(["trackPageView"]); _paq.push(["enableLinkTracking"]); (function() { var u="//analytics.connectedforlife.in/"; _paq.push(["setTrackerUrl", u+"piwik.php"]); _paq.push(["setSiteId", '.$fetch_xml->row->idsite.']); var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript"; g.async=true; g.defer=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s); })(); </script> <noscript><p><img src="//analytics.connectedforlife.in/piwik.php?idsite='.$fetch_xml->row->idsite.'" style="border:0;" alt="" /></p></noscript> <!-- End Piwik Code -->';

					/**		END PIWIK Implementation		**/


					/**			writing database details directly inside db_info.php file		**/				
	
					$dbname					=			$_POST['database_name'];									//source
					$dbuser					=			$_POST['database_user'];									//source
					$dbpassword			=			$_POST['database_password'];							//source
					$dbtable				=			$_POST['database_table'];									//source
					$iv							=			"admin@thinkersforlife.com";							//iv
					$password				=			"admin-thfl@#01";													//password
					$method					=			"AES-256-CBC";														//method

					edit_db_info_file("dbname",1,$dbname);
					edit_db_info_file("dbuser",2,$dbuser);
					edit_db_info_file("dbpass",3,$dbpassword);
					edit_db_info_file("dbtable",4,$dbtable);

					/**			END ENCRYPTION			**/


					//Replacing the value 
					$NameofActivity->nodeValue				=				$_POST['name_of_activity'];
					/*$DatabaseName->nodeValue					=				$_POST['database_name'];
					$DatabaseUser->nodeValue					=				$_POST['database_user'];
					$DatabasePassword->nodeValue			=				$_POST['database_password'];
					$DatabaseTable->nodeValue					=				$_POST['database_table'];*/
					$Domain->nodeValue								=				str_replace("thfl-admin/dashboard.php","",$_SERVER['HTTP_REFERER']);
					$EmailDomain->nodeValue						=				$_POST['email_domain'];
					$Location->nodeValue							=				$_POST['location'];
	
					$xml->save("../config.xml") or die("Couldn't save");

					$result=createTable($_POST['database_table']);

					echo "Database Configuration Updated";

}elseif(isset($_POST['activity'])){
	
					$xml = new DOMDocument('1.0', 'utf-8');
					$xml->formatOutput = true;
					$xml->preserveWhiteSpace = false;
					$check=$xml->load('../config.xml');
					if($check===FALSE)
						$xml->load('../../../thfl-admin/config.xml') or die("Couldn't find XML file even after 1 FALSE");	

					//Get item Element
					$element = $xml->getElementsByTagName('Configuration')->item(0) or die("Couldn't find Configuration node for activity");

					//Load child elements
					$NameofActivity = $element->getElementsByTagName('Activity')->item(0) or die("Couldn't load Activity");

					//Replacing the value 
					$NameofActivity->nodeValue=trim($_POST['activity']);
	
					$xml->save("../config.xml") or die("Couldn't save activity");
	

					echo "Activity has been changed successfully!";

}elseif(isset($_POST['theme'])){

					$xml = new DOMDocument('1.0', 'utf-8');
					$xml->formatOutput = true;
					$xml->preserveWhiteSpace = false;
					$xml->load('../config.xml') or die("Couldn't load config.xml for theme");

					//Get item Element
					$element = $xml->getElementsByTagName('Configuration')->item(0) or die("Couldn't find Configuration node for changing theme ");

					//Load child elements
					$NameofActivity = $element->getElementsByTagName('ThemeName')->item(0) or die("Couldn't load ThemeName");

					//Replacing the value 
					$NameofActivity->nodeValue=$_POST['theme'];
	
					$xml->save("../config.xml") or die("Couldn't change the theme");
	
					echo "Theme has been changed successfully!";

}elseif(!empty($_POST['beforeimageupload'])){
		

}elseif(!empty($_POST['updateWords'])){
	
			//	addWord
			addWord($_POST['word'],$_POST['category'],$_POST['tags'],'4pics1');
			//	getLastWordDetails
			$mslno=getLastWordDetails();
			//	updateFolderName
			updateWordFolder($_POST['loc'],$mslno);

			echo "Your word has been added to database successfully !";

}elseif(!empty($_FILES)){

				//	$mime_type=check_mime_content_type($_FILES["activity-file"]["name"]);
				//	echo $mime_type;
					if(is_zip_file($_FILES["activity-file"]["name"]) && zipIsValid($_FILES["activity-file"]["tmp_name"])){
				//		echo "VALID";
				//		pr($_FILES);
				//		echo $mime_type;
						$zip = new ZipArchive;
						$filedetail=pathinfo($_FILES["activity-file"]["name"]);
						if ($zip->open($_FILES["activity-file"]["tmp_name"]) === TRUE) {
								$zip->extractTo('../assets/Games/'.$filedetail["filename"]."/");
								recurse_copy("../assets/support_files/",'../assets/Games/'.$filedetail["filename"]."/");
								$zip->close();
								echo 'Activity Uploaded Successfully!';
						} else {
								echo 'Error occured while extracting zip file.';
						}		
					}
					else
						echo "Please upload only zip files(*.zip).";

}elseif(isset($_POST['result'])){
	
					include_once("../../thfl-admin/model/functions.php");
					$xml=simplexml_load_file("../config.xml") or die("Error: Cannot load configuration file");

					$edate=time();
					$name=$_POST['name'];
					$email=$_POST['email'];
					$companyName=$_POST['company_name'];
					$location=$_POST['location'];
					$quizName=$xml->Configuration->Activity;
					$status=$_POST['status'];
					$rawScr=$_POST['rawScr'];
					$gameTime=$_POST['gameTime'];
					$passScr=$_POST['passScr'];
					$maxScr=$_POST['maxScr'];
					$minScr=$_POST['minScr'];
					$time=$_POST['null'];
					$jic=$_POST['jic'];
					$hashtag=hash('md5',"hashtag");

					$result=addResult($edate,$name,$email,$companyName,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$time,$jic,$hashtag);

					echo $result;

}elseif(isset($_POST['deletePicture'])){
		deletePicture($_POST['deletePicture']);
}

function logRatings($name,$email,$stars){

	include_once("database_class.php");
	
	$db = Database::getInstance();	

	$log_ratings=$db->logRatings($name,$email,$stars);

	return $log_ratings;
}

function getRatings($email){

	include_once("database_class.php");
	
	$db = Database::getInstance();	

	$get_ratings=$db->getRatings($email);

	return $get_ratings;
}

function getResult($limit=0,$email=-1){

	include_once("database_class.php");
	
	$db = Database::getInstance();	

	if($email!=-1)
	{
		$get_result=$db->getResult($limit,$email);	
	}
	else if($_SESSION['isLoggedIn']==true)
	{
		$get_result=$db->getResult($limit,$_SESSION['visitor_email']);	
	}
	else
	{	
		$get_result=$db->getResult($limit);
	}
	return $get_result;
	
}
function getResultforExport($limit=0,$email=0){

	include_once("database_class.php");
	
	$db = Database::getInstance();	

	$export_rows=array();
	$export_cnt=0;

	$get_result=$db->getResult($limit,$email);
//	print_r($get_result);exit();
	$result_count=count($get_result);

	if($email!=-1)
		$export_rows[$export_cnt]=array(" This game has been played ".$result_count. " times");
	else
		$export_rows[$export_cnt]=array(" This game has been played by ".$result_count. " employees");		

	$export_cnt++;
	$export_rows[$export_cnt]=array("Sl. No. ","Name","Email","Company Name","Location","Total Score");
	$export_cnt++;

	$cnt=0;

	foreach($get_result as $item){
		$cnt++;	
		$timestamp = strtotime($item['edate'])+45000;
		//$date = date('d-m-Y', $timestamp);
		//$time = date('H:i:s', $timestamp);
		$export_rows[$export_cnt]=array($cnt,$item['name'],$item['email'],$item['companyName'],$item['location'],$item['totalScr']);
		$export_cnt++;			
	}

	return $export_rows;
	
}
function addResult($edate,$name,$email,$companyName,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$time,$jic,$hashtag){

	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$add_result=$db->addResult($edate,$name,$email,$companyName,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$time,$jic,$hashtag);
	
	return $add_result;
	
}
function updateResult($edate,$name,$email,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$totalGameTime,$totalScr,$jic,$hashtag){

	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$update_result=$db->updateResult($edate,$name,$email,$location,$quizName,$userAns,$correctAns,$status,$rawScr,$gameTime,$passScr,$maxScr,$minScr,$totalGameTime,$totalScr,$jic,$hashtag);
	
	return $update_result;
	
}
function createTable($table){

	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$result=$db->createTable($table);
	
	return $result;
}
function runQuery($query){
		
	chdir("../../../thfl-admin/model/");

	include_once("database_class.php");
	
	$db = Database::getInstance();	

	$result=$db->runQuery($query);

	return $result;
	
}

function getDemoGamesConfiguration(){
	
	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$demo_games_config=$db->getDemoGamesConfiguration();
	
	return $demo_games_config;
}

function getLastWordDetails($table='4pics1'){
	
	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$pic_count=$db->getLastWordDetails($table);

	return $pic_count[0]['mslno'];
}

function getWordDetails($serialno,$table='4pics1'){
	
	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$word_details=$db->getWordDetails($serialno,$table);

	return $word_details;
}
function addWord($word,$category,$tags,$table='4pics1'){

	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$result=$db->addWord(strtoupper($word),$category,$tags,$table);
	
	return $result;
}
function deletePicture($slno){

	include_once("database_class.php");
	
	$db = Database::getInstance();	
	
	$result=$db->deletePicture($slno);

	rrmdir("../../themes/assets/pics/".$slno);	

	return $result;
}

