<?php
session_start();
//echo phpinfo();
error_reporting(-1);
ini_set('display_errors', 'On');
// added in v4.0.0
require_once '../lib/fb/autoload.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphLocation;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '663915727046036','82fe0ef6406d920e369db1a12626a266' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://192.168.1.219/Build/DEV/ShellRedefinedWithFB/themes/assets/GameLoaders/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();

	//ADDED BY JAY SHAH on 18th June, 2015 at 9:00 AM
	$user = $response->getGraphObject(GraphUser::className());
	$loc = $response->getGraphObject(GraphLocation::className());

	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
	$fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	$femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	try{
		if($graphObject->getProperty('email')==null && $graphObject->getProperty('email')=="")
			throw new Exception("Err");
		else
			$location=$graphObject->getProperty('email');
	}catch(Exception $e){
		$femail="email not provided";
	}
	try{
		if($graphObject->getProperty('location')==null && $graphObject->getProperty('location')=="")
			throw new Exception("Err");
		else
			$location=$graphObject->getProperty('location')->asArray();
	}catch(Exception $e){
		$location['name']="location not provided";
	}
	
	/* ---- Session Variables -----*/
	$_SESSION['LOCATION']=$location['name'];
	$_SESSION['FBID'] = $fbid;           
	$_SESSION['FULLNAME'] = $fbfullname;
	$_SESSION['EMAIL'] =  $femail;

	/* ---- header location after session ----*/
  header("Location: http://192.168.1.219/Build/DEV/ShellRedefinedWithFB/");
} else {
  $loginUrl = $helper->getLoginUrl(array('scope' => 'email,user_location'));
 header("Location: ".$loginUrl);
}
?>
