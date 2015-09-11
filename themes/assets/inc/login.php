<?php // Starting the session to track the latest word
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();
if(strcmp($_POST['action'],"login")!=0){
	echo "Unauthorized access!";
	exit();
}elseif( $_POST['form_token'] != $_SESSION['form_token']){
    echo 'Invalid form submission!';exit();
}

$whitelist = array("advaitalegal.com", "kpmg.com", "bsraffiliates.com"); 
//You can add basically whatever you want here because it checks for one of these strings to be at the end of the $email string.
$email = filter_input(INPUT_POST,'visitor_email',FILTER_VALIDATE_EMAIL);

function validateEmailDomain($email, $domains) {
    foreach ($domains as $domain) {
        $pos = strpos($email, $domain, strlen($email) - strlen($domain));

        if ($pos === false)
            continue;

        if ($pos == 0 || $email[(int) $pos - 1] == "@" || $email[(int) $pos - 1] == ".")
            return true;
    }

    return false;
}
/*
if (!validateEmailDomain($email, $whitelist))
{
	echo "Invalid email id";exit();
}
*/
if(!isset($_SESSION['FBID'])){

	$_SESSION['FBID']="notfblogin";

	/*OLD CODE
	$_SESSION['visitor_name']=$_POST['visitor_name'];
	$_SESSION['visitor_email']=$_POST['visitor_email'];
	$_SESSION['visitor_location']=$_POST['visitor_location'];
	$_SESSION['company_name']=$_POST['company_name'];*/

	//NEW CODE WITH FILTERING INPUT 
	//			By Jay Shah On 21st July, 2015 at 14:18:31
	$_SESSION['visitor_name']			=		filter_input(INPUT_POST,'visitor_name',FILTER_SANITIZE_STRING);
	$_SESSION['visitor_email']		=		filter_input(INPUT_POST,'visitor_email',FILTER_VALIDATE_EMAIL);
	$_SESSION['visitor_location']	=		filter_input(INPUT_POST,'visitor_location',FILTER_SANITIZE_STRING);
	$_SESSION['company_name']			=		filter_input(INPUT_POST,'company_name',FILTER_SANITIZE_STRING);

}else{

	$_SESSION['visitor_name']			=		$_SESSION['FULLNAME'];
	$_SESSION['visitor_email']		=		$_SESSION['EMAIL'];
	$_SESSION['visitor_location']	=		$_SESSION['LOCATION'];
	$_SESSION['company_name']			=		"fblogin";

}

include_once("../../../thfl-admin/model/functions.php");
include_once("../../../thfl-admin/model/db_config.php");

$xml=simplexml_load_file("../../../thfl-admin/config.xml") or die("Error: Cannot load configuration file");

$_SESSION['hash']=hash("md5",time());

$sql_query="INSERT INTO ".RESULT_TABLE." SET name='".$_SESSION['visitor_name']."', email='".$_SESSION['visitor_email']."', location='".$_SESSION['visitor_location']."',companyName='".$_SESSION['company_name']."', quizName='".$xml->Configuration->NameofActivity."',hashtag='".$_SESSION['hash']."',field1='".$_SESSION['FBID']."',session_id='".session_id()."',ip_address='".get_client_ip()."',user_agent='".$_SERVER['HTTP_USER_AGENT']."'";

runQuery($sql_query);

$_SESSION['ratings']=getRatings($_SESSION['visitor_email']);

unset($_SESSION['form_token']);

$_SESSION['isLoggedIn']=true;

echo "Login Successful";


