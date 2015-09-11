<?php
//error_reporting(-1);
//ini_set('display_errors', 'On');
session_start();
function array_sort_by_column(&$array, $column, $direction = SORT_ASC) {
    $reference_array = array();

    foreach($array as $key => $row) {
        $reference_array[$key] = $row[$column];
    }

    array_multisort($reference_array, $direction, $array);
}

$filename			=	"scores.xml";
$xml					=	simplexml_load_file($filename) or die("Error: Cannot create object");


if(isset($_POST['getResult'])){	

				foreach($xml->user as $item) {
						$users[] = array(
									           'name'           => (string)$item->attributes()->name,
									           'score'          => (string)$item->score,
									           'maxTileValue'   => (string)$item->maxTileValue,
									           'maxProduct'     => (string)$item->maxProduct,
									           'timestamp' 			=> (string)$item->timestamp
									          );
				}


				foreach($users as $user){ 
						foreach($user as $key=>$value){ 
								if(!isset($sortArray[$key])){ 
								    $sortArray[$key] = array(); 
								} 
								$sortArray[$key][] = $value; 
						} 
				} 

				$orderby = "score"; //change this to whatever key you want from the array 

				array_multisort($sortArray[$orderby],SORT_DESC,$users); 

				$response		=		"<table id='resultTable' cellpadding='10'>";
				$response		.=	"<tr><th>Name</th><th>Score</th><!--<th>Max Tile</th><th>Date & Time</th>--></tr>";			
				
				$cnt				=		0;
				$limit			=		5;
				foreach($users as  $user){
					if($cnt==$limit)	break;
					$response	.=	"<tr>";

						$response	.=	"<td>".$user['name']."</td>";
						$response	.=	"<td>".$user['score']."</td>";
/*						$response	.=	"<td>".$user['maxTileValue']."</td>";
						$response	.=	"<td>".$user['timestamp']."</td>";*/

					$response	.=	"</tr>";

					$cnt++;
				}

				$response		.=	"</table>";

				echo $response;

				exit();

}
//print_r($_POST);

/*
$date					=	date("d M Y H:i:s");
$score				=	$_POST['score'];
$maxProduct		=	$_POST['maxProduct'];
$maxTileValue	=	$_POST['maxTileValue'];

$name					=	$_SESSION['visitor_name'];
$email				=	$_SESSION['visitor_email'];
$location			=	$_SESSION['visitor_location'];
$company			=	$_SESSION['company_name'];

//Creating new user element in the existing file
$user	=	$xml->addChild("user");

//Adding the new Name attribute to the newly created USER element
$user->addAttribute("name",$name);
$user->addAttribute("email",$email);
$user->addAttribute("location",$location);
$user->addAttribute("company",$company);

//Adding the child elements to the newly created USER element
$user->addChild("maxProduct",$maxProduct);
$user->addChild("maxTileValue",$maxTileValue);
$user->addChild("score",$score);
$user->addChild("timestamp",$date);

//Save XML File
$xml->asXML($filename);
*/

/*	NEW CODE
		Defining session array for result.php which will be used to store the result in database
																									 BY Jay Shah on 29th June, 2015 at 2:00 PM
*/
//echo $_SESSION['time']." ".time();
$secs = (time() - $_SESSION["time"]);
//echo $secs;
//$_SESSION['time']=time();
$_SESSION['shell_result_fields']['name']				=		$_SESSION['visitor_name'];
$_SESSION['shell_result_fields']['email']				=		$_SESSION['visitor_email'];
$_SESSION['shell_result_fields']['companyName']	=		$_SESSION['company_name'];
$_SESSION['shell_result_fields']['location']		=		$_SESSION['visitor_location'];
$_SESSION['shell_result_fields']['quizName']		=		"Morpheus";
$_SESSION['shell_result_fields']['rawScr']			=		$_POST['score'];
$_SESSION['shell_result_fields']['totalScr']			=		$_POST['score'];
$_SESSION['shell_result_fields']['gameTime']		=		$secs;
$_SESSION['shell_result_fields']['field1']			=		'FBID: ' .$_SESSION['FBID'];
$_SESSION['shell_result_fields']['field2']			=		'maxProduct: '.$_SESSION['maxProduct'];
$_SESSION['shell_result_fields']['field3']			=		"maxTileValue: ".$_SESSION['maxTileValue'];
$_SESSION['shell_result_fields']['field4']			=		"played on: ".date("d M Y H:i:s");
/*				END				*/

//$_SESSION['maxTileValue'] = $_POST['maxTileValue'];
//$_SESSION['maxProduct']		=	$_POST['maxProduct'];
//$_SESSION['rawScr']				=	$_POST['score'];
//$_SESSION['date']					=	$date;
//$_SESSION['game']					=	"Morpheus";

//echo $xml->user['email'];
//echo $xml->user->maxTileValue;
header("Location: result.php");
exit();
